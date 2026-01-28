@extends('layout.app')

@section('title', 'Recommended Support – MeRS')

@section('content')
<div class="max-w-3xl mx-auto">

    <h1 class="text-2xl font-semibold mb-4 text-center">
        Recommended Support
    </h1>

    <p class="text-slate-600 text-center mb-10 leading-relaxed">
        Based on your screening result, MeRS suggests the following
        support options. You are free to choose what feels most appropriate
        for your situation.
    </p>

    @php
        $risk = session('risk_level', 'low');
    @endphp

    {{-- LOW RISK --}}
    @if ($risk === 'low')
        <div class="space-y-6">

            <div class="bg-white border rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-2">
                    Self-Care & Mental Health Education
                </h2>
                <p class="text-slate-600 text-sm mb-4">
                    Your screening indicates mild psychological distress.
                    Maintaining self-care routines and improving mental health
                    awareness may be sufficient at this stage.
                </p>
                <ul class="list-disc list-inside text-sm text-slate-600">
                    <li>Stress management and relaxation techniques</li>
                    <li>Healthy sleep and daily routines</li>
                    <li>Reliable mental health education resources</li>
                </ul>
            </div>

            <div class="bg-white border rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-2">
                    Periodic Self-Monitoring
                </h2>
                <p class="text-slate-600 text-sm">
                    You may consider repeating the screening periodically
                    to monitor any changes in your psychological condition.
                </p>
            </div>

        </div>
    @endif

    {{-- MODERATE RISK --}}
    @if ($risk === 'moderate')
        <div class="space-y-6">

            <div class="bg-white border rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-2">
                    Professional Psychological Support
                </h2>
                <p class="text-slate-600 text-sm mb-4">
                    Your screening suggests a moderate level of psychological distress.
                    Consulting a licensed psychologist can help address your concerns
                    and prevent symptoms from worsening.
                </p>
                <ul class="list-disc list-inside text-sm text-slate-600">
                    <li>Clinical psychologists</li>
                    <li>University or community counseling services</li>
                    <li>Tele-psychology platforms</li>
                </ul>
            </div>

            <div class="bg-white border rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-2">
                    Psychoeducation & Self-Care
                </h2>
                <p class="text-slate-600 text-sm">
                    Combining professional support with daily self-care
                    practices may improve overall well-being.
                </p>
            </div>

        </div>
    @endif

    {{-- HIGH RISK --}}
    @if ($risk === 'high')
        <div class="space-y-6">

            <div class="bg-red-50 border border-red-300 rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-2 text-red-700">
                    Immediate Professional Support Required
                </h2>
                <p class="text-red-700 text-sm mb-4">
                    Your screening indicates a high level of psychological distress.
                    Immediate professional or emergency support is strongly recommended
                    to ensure your safety.
                </p>
                <ul class="list-disc list-inside text-sm text-red-700">
                    <li>Psychiatrists or mental health specialists</li>
                    <li>Hospital emergency services</li>
                    <li>Crisis hotlines and emergency mental health services</li>
                </ul>
            </div>

            <div class="bg-white border rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-2">
                    Involve Trusted Individuals
                </h2>
                <p class="text-slate-600 text-sm">
                    Consider reaching out to a trusted family member or close friend
                    to help you seek immediate support.
                </p>
            </div>

        </div>
    @endif

    <div class="mt-12 text-center">
        <a href="{{ url('/') }}"
           class="inline-block px-6 py-2 rounded-md border
                  text-slate-600 hover:bg-slate-100">
            Finish & Return Home
        </a>
    </div>

    <p class="text-xs text-slate-500 mt-8 text-center">
        MeRS does not replace professional diagnosis or treatment.
        If you feel unsafe, please contact emergency services immediately.
    </p>

</div>
@endsection
