<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    /**
     * Store PHQ-9 answers and calculate score
     */
    public function storePHQ9(Request $request)
    {
        $validated = $request->validate([
            'q0' => 'required|integer',
            'q1' => 'required|integer',
            'q2' => 'required|integer',
            'q3' => 'required|integer',
            'q4' => 'required|integer',
            'q5' => 'required|integer',
            'q6' => 'required|integer',
            'q7' => 'required|integer',
            'q8' => 'required|integer',
        ]);

        $score = array_sum($validated);

        session([
            'phq9_score' => $score
        ]);

        return redirect('/screening/gad7');
    }

    /**
     * Store GAD-7 answers and calculate score
     */
    public function storeGAD7(Request $request)
    {
        $validated = $request->validate([
            'q0' => 'required|integer',
            'q1' => 'required|integer',
            'q2' => 'required|integer',
            'q3' => 'required|integer',
            'q4' => 'required|integer',
            'q5' => 'required|integer',
            'q6' => 'required|integer',
        ]);

        $score = array_sum($validated);

        session([
            'gad7_score' => $score
        ]);

        return redirect('/screening/pcl5');
    }

    /**
     * Store PCL-5 answers and calculate score
     */
    public function storePCL5(Request $request)
    {
        $validated = $request->validate([
            'q0'  => 'required|integer',
            'q1'  => 'required|integer',
            'q2'  => 'required|integer',
            'q3'  => 'required|integer',
            'q4'  => 'required|integer',
            'q5'  => 'required|integer',
            'q6'  => 'required|integer',
            'q7'  => 'required|integer',
            'q8'  => 'required|integer',
            'q9'  => 'required|integer',
            'q10' => 'required|integer',
            'q11' => 'required|integer',
            'q12' => 'required|integer',
            'q13' => 'required|integer',
            'q14' => 'required|integer',
            'q15' => 'required|integer',
            'q16' => 'required|integer',
            'q17' => 'required|integer',
            'q18' => 'required|integer',
            'q19' => 'required|integer',
        ]);

        $score = array_sum($validated);

        session([
            'pcl5_score' => $score
        ]);

        return redirect('/result');
    }

    /**
     * Show result and determine risk level
     */
    public function result()
    {
        $phq9 = session('phq9_score', 0);
        $gad7 = session('gad7_score', 0);
        $pcl5 = session('pcl5_score', 0);

        // Risk classification (MVP – sesuai PDF)
        if ($phq9 >= 20 || $gad7 >= 15 || $pcl5 >= 33) {
            $risk = 'high';
        } elseif ($phq9 >= 10 || $gad7 >= 10 || $pcl5 >= 20) {
            $risk = 'moderate';
        } else {
            $risk = 'low';
        }

        session([
            'risk_level' => $risk
        ]);

        return view('result', compact('risk'));
    }
}
