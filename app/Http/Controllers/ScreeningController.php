<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Screening;
use App\Models\ScreeningAnswer;
use App\Services\RiskClassificationService;

class ScreeningController extends Controller
{
    protected RiskClassificationService $riskService;

    public function __construct(RiskClassificationService $riskService)
    {
        $this->riskService = $riskService;
    }

    public function storePHQ9(Request $request)
    {
        $validated = $request->validate([
            'q0' => 'required|integer|min:0|max:3',
            'q1' => 'required|integer|min:0|max:3',
            'q2' => 'required|integer|min:0|max:3',
            'q3' => 'required|integer|min:0|max:3',
            'q4' => 'required|integer|min:0|max:3',
            'q5' => 'required|integer|min:0|max:3',
            'q6' => 'required|integer|min:0|max:3',
            'q7' => 'required|integer|min:0|max:3',
            'q8' => 'required|integer|min:0|max:3',
        ]);

        DB::transaction(function () use ($validated) {
            $screening = Screening::create([
                'session_id' => (string) Str::uuid(),
                'phq9_score' => array_sum($validated),
                'expires_at' => Screening::defaultExpiry(),
            ]);

            foreach ($validated as $key => $value) {
                ScreeningAnswer::create([
                    'screening_id' => $screening->id,
                    'instrument' => 'phq9',
                    'question_index' => (int) str_replace('q', '', $key),
                    'value' => $value,
                ]);
            }

            session(['screening_id' => $screening->id]);
        });

        return redirect('/screening/gad7');
    }

    public function storeGAD7(Request $request)
    {
        $validated = $request->validate([
            'q0' => 'required|integer|min:0|max:3',
            'q1' => 'required|integer|min:0|max:3',
            'q2' => 'required|integer|min:0|max:3',
            'q3' => 'required|integer|min:0|max:3',
            'q4' => 'required|integer|min:0|max:3',
            'q5' => 'required|integer|min:0|max:3',
            'q6' => 'required|integer|min:0|max:3',
        ]);

        DB::transaction(function () use ($validated) {
            $screening = Screening::findOrFail(session('screening_id'));

            $screening->update([
                'gad7_score' => array_sum($validated),
            ]);

            foreach ($validated as $key => $value) {
                ScreeningAnswer::create([
                    'screening_id' => $screening->id,
                    'instrument' => 'gad7',
                    'question_index' => (int) str_replace('q', '', $key),
                    'value' => $value,
                ]);
            }
        });

        return redirect('/screening/pcl5');
    }

    public function storePCL5(Request $request)
    {
        $validated = $request->validate([
            'q0'  => 'required|integer|min:0|max:4',
            'q1'  => 'required|integer|min:0|max:4',
            'q2'  => 'required|integer|min:0|max:4',
            'q3'  => 'required|integer|min:0|max:4',
            'q4'  => 'required|integer|min:0|max:4',
            'q5'  => 'required|integer|min:0|max:4',
            'q6'  => 'required|integer|min:0|max:4',
            'q7'  => 'required|integer|min:0|max:4',
            'q8'  => 'required|integer|min:0|max:4',
            'q9'  => 'required|integer|min:0|max:4',
            'q10' => 'required|integer|min:0|max:4',
            'q11' => 'required|integer|min:0|max:4',
            'q12' => 'required|integer|min:0|max:4',
            'q13' => 'required|integer|min:0|max:4',
            'q14' => 'required|integer|min:0|max:4',
            'q15' => 'required|integer|min:0|max:4',
            'q16' => 'required|integer|min:0|max:4',
            'q17' => 'required|integer|min:0|max:4',
            'q18' => 'required|integer|min:0|max:4',
            'q19' => 'required|integer|min:0|max:4',
        ]);

        DB::transaction(function () use ($validated) {
            $screening = Screening::findOrFail(session('screening_id'));

            $pcl5Score = array_sum($validated);

            $risk = $this->riskService->classify(
                (int) $screening->phq9_score,
                (int) $screening->gad7_score,
                $pcl5Score
            );

            $emergency = $risk === 'high';

            $screening->update([
                'pcl5_score' => $pcl5Score,
                'risk_level' => $risk,
                'emergency_flag' => $emergency,
                'emergency_reason' => $emergency
                    ? 'High-risk classification based on clinical cut-off thresholds'
                    : null,
            ]);

            foreach ($validated as $key => $value) {
                ScreeningAnswer::create([
                    'screening_id' => $screening->id,
                    'instrument' => 'pcl5',
                    'question_index' => (int) str_replace('q', '', $key),
                    'value' => $value,
                ]);
            }

            session(['risk_level' => $risk]);
        });

        return redirect('/result');
    }

    public function result()
    {
        $risk = session('risk_level');
        if (!$risk) {
            abort(404);
        }
        return view('result', compact('risk'));
    }
}
