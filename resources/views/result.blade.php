@extends('layout.app')

@section('title', 'Screening Result – MeRS')

@section('content')
<div class="max-w-2xl mx-auto text-center">

    <h1 class="text-2xl font-semibold mb-4">
        Screening Result
    </h1>

    <p class="text-slate-600 mb-8 leading-relaxed">
        Based on your responses, MeRS has identified your current
        psychological risk level. This result is not a medical diagnosis,
        but a guide to help you access appropriate support.
    </p>

    @php
        $labels = [
            'low' => [
                'Low Risk',
                'Your responses indicate mild psychological distress. At this stage, self-care, monitoring, and mental health education may be sufficient.'
            ],
            'moderate' => [
                'Moderate Risk',
                'You may be experiencing psychological distress that could benefit from professional psychological support to prevent symptoms from becoming more severe.'
            ],
            'high' => [
                'High Risk',
                'Your responses indicate a high level of psychological distress. Immediate professional or emergency support is strongly recommended to ensure your safety.'
            ]
        ];
    @endphp

    {{-- Risk Level Card --}}
    <div class="bg-white border rounded-lg p-6 mb-8">

        <h2 class="text-xl font-semibold mb-2">
            {{ $labels[$risk][0] }}
        </h2>

        <p class="text-slate-600 text-sm leading-relaxed">
            {{ $labels[$risk][1] }}
        </p>

    </div>

    {{-- Action --}}
    <a href="{{ url('/routing') }}"
       class="inline-block px-8 py-3 rounded-md bg-slate-800 text-white
              hover:bg-slate-700 transition">
        View Recommended Support
    </a>

    <p class="text-xs text-slate-500 mt-6">
        If you feel unsafe or are experiencing thoughts of self-harm,
        please contact local emergency services or a crisis hotline immediately.
    </p>

</div>
@endsection
