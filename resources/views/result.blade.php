@extends('layout.app')

@section('title', 'Screening Result – MeRS')

<link rel="stylesheet" href="{{ asset('css/result.css') }}">

@section('content')
<div class="result-page-wrapper">

    <div class="result-main-card">

        {{-- 1. HEADER SECTION --}}
        <div class="result-header">
            <h1 class="result-main-title">Screening Result</h1>
            <p class="result-subtitle">
                Based on your responses, here is the analysis of your current psychological state.
            </p>
        </div>

        @php
            $labels = [
                'low' => [
                    'title' => 'Low Risk',
                    'desc' => 'Your responses indicate mild psychological distress. Self-care and monitoring may be sufficient at this stage.',
                    'class' => 'risk-low'
                ],
                'moderate' => [
                    'title' => 'Moderate Risk',
                    'desc' => 'You may be experiencing distress that could benefit from professional support to prevent worsening symptoms.',
                    'class' => 'risk-mod'
                ],
                'high' => [
                    'title' => 'High Risk',
                    'desc' => 'High level of distress indicated. Immediate professional or emergency support is strongly recommended.',
                    'class' => 'risk-high'
                ]
            ];

            $currentResult = $labels[$risk] ?? $labels['low'];
        @endphp

        {{-- 2. RESULT BOX --}}
        <div class="risk-status-box {{ $currentResult['class'] }}">
            <div class="risk-badge">Current Status</div>
            <h2 class="risk-title">{{ $currentResult['title'] }}</h2>
            <p class="risk-description">
                {{ $currentResult['desc'] }}
            </p>
        </div>

        {{-- 3. ACTION BUTTON --}}
        <div class="result-action-area">
            <p class="action-label">What should you do next?</p>
            <a href="{{ url('/routing') }}" class="btn-result-primary">
                View Recommended Support
            </a>
        </div>

        {{-- 4. 30-DAY TOKEN SECTION --}}
        @if(session('screening_token'))
            <div class="result-token-box">
                <h3 class="token-title">30-Day Follow-Up Token</h3>
                <div class="token-code">
                    {{ session('screening_token') }}
                </div>
                <p class="token-desc">
                    Save this token securely. You can review your screening result within 30 days using this code.
                </p>
            </div>
        @endif

    </div>

    {{-- 5. FOOTER DISCLAIMER --}}
    <p class="result-disclaimer">
        <strong>Note:</strong> This result is not a medical diagnosis.<br>
        If you feel unsafe, please contact local emergency services immediately.
    </p>

</div>
@endsection
