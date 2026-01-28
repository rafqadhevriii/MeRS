<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GAD7Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'q0' => 'required|integer|min:0|max:3',
            'q1' => 'required|integer|min:0|max:3',
            'q2' => 'required|integer|min:0|max:3',
            'q3' => 'required|integer|min:0|max:3',
            'q4' => 'required|integer|min:0|max:3',
            'q5' => 'required|integer|min:0|max:3',
            'q6' => 'required|integer|min:0|max:3',
        ];
    }
}
