<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PCL5Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
        ];
    }
}
