<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Requests\PHQ9Request;
use App\Http\Requests\GAD7Request;
use App\Http\Requests\PCL5Request;

use App\Models\Screening;
use App\Models\ScreeningAnswer;
use App\Services\RiskClassificationService;
use App\Services\AuditLogger;

class ScreeningApiController extends Controller
{
    protected RiskClassificationService $riskService;
    protected AuditLogger $audit;

    public function __construct(
        RiskClassificationService $riskService,
        AuditLogger $audit
    ) {
        $this->riskService = $riskService;
        $this->audit = $audit;
    }

    public function phq9(PHQ9Request $request)
    {
        $data = $request->validated();

        $existing = Screening::where('idempotency_key', $data['idempotency_key'])->first();
        if ($existing) {
            return response()->json([
                'screening_id' => $existing->id,
                'next' => 'gad7'
            ]);
        }

        $screening = DB::transaction(function () use ($data) {

            $screening = Screening::create([
                'session_id' => (string) Str::uuid(),
                'idempotency_key' => $data['idempotency_key'],
                'phq9_score' => array_sum($data),
                'expires_at' => Screening::defaultExpiry(),
            ]);

            foreach ($data as $k => $v) {
                if (str_starts_with($k, 'q')) {
                    ScreeningAnswer::create([
                        'screening_id' => $screening->id,
                        'instrument' => 'phq9',
                        'question_index' => (int) str_replace('q', '', $k),
                        'value' => $v,
                    ]);
                }
            }

            $this->audit->log(
                $screening->session_id,
                $screening->id,
                'api_phq9',
                'info',
                'PHQ-9 submitted via API'
            );

            return $screening;
        });

        return response()->json([
            'screening_id' => $screening->id,
            'next' => 'gad7'
        ], 201);
    }

    public function gad7(GAD7Request $request, Screening $screening)
    {
        $data = $request->validated();

        DB::transaction(function () use ($screening, $data) {

            if ($screening->gad7_score !== null) return;

            $screening->update([
                'gad7_score' => array_sum($data),
            ]);

            foreach ($data as $k => $v) {
                ScreeningAnswer::create([
                    'screening_id' => $screening->id,
                    'instrument' => 'gad7',
                    'question_index' => (int) str_replace('q', '', $k),
                    'value' => $v,
                ]);
            }
        });

        return response()->json(['next' => 'pcl5']);
    }

    public function pcl5(PCL5Request $request, Screening $screening)
    {
        $data = $request->validated();

        DB::transaction(function () use ($screening, $data) {

            if ($screening->pcl5_score !== null) return;

            $pcl5 = array_sum($data);

            $risk = $this->riskService->classify(
                $screening->phq9_score,
                $screening->gad7_score,
                $pcl5
            );

            $screening->update([
                'pcl5_score' => $pcl5,
                'risk_level' => $risk,
                'emergency_flag' => $risk === 'high',
                'emergency_reason' => $risk === 'high'
                    ? 'High-risk classification based on clinical cut-off thresholds'
                    : null,
            ]);

            foreach ($data as $k => $v) {
                ScreeningAnswer::create([
                    'screening_id' => $screening->id,
                    'instrument' => 'pcl5',
                    'question_index' => (int) str_replace('q', '', $k),
                    'value' => $v,
                ]);
            }

            $this->audit->log(
                $screening->session_id,
                $screening->id,
                'api_risk_classified',
                $risk === 'high' ? 'critical' : 'info',
                'Risk classified via API',
                ['risk' => $risk]
            );
        });

        return response()->json([
            'risk' => $screening->risk_level,
            'emergency' => $screening->emergency_flag
        ]);
    }
}
