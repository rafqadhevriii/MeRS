<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PHQ9Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'idempotency_key' => 'required|string',
            'q0' => 'required|integer|min:0|max:3',
            'q1' => 'required|integer|min:0|max:3',
            'q2' => 'required|integer|min:0|max:3',
            'q3' => 'required|integer|min:0|max:3',
            'q4' => 'required|integer|min:0|max:3',
            'q5' => 'required|integer|min:0|max:3',
            'q6' => 'required|integer|min:0|max:3',
            'q7' => 'required|integer|min:0|max:3',
            'q8' => 'required|integer|min:0|max:3',
        ];
    }
}
