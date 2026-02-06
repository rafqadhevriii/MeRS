@extends('layout.app')

@section('title', 'Recommended Support – MeRS')


<link rel="stylesheet" href="{{ asset('css/routing.css') }}">


@section('content')

{{-- 1. WRAPPER PENENGAH (TIDAK BERUBAH) --}}
<div class="page-centering-wrapper">

    {{-- 2. KARTU UTAMA (TIDAK BERUBAH) --}}
    <div class="final-centered-card">

        {{-- Header Kartu --}}
        <div class="final-card-header">
            <h1 class="final-title">Recommended Support</h1>
            <p class="final-subtitle">
                Based on your result, here are the suggested next steps.
            </p>
        </div>

        @php
            $risk = session('risk_level', 'low');
        @endphp

        {{-- CONTAINER ITEM BARU --}}
        <div>

            {{-- === LOW RISK === --}}
            @if ($risk === 'low')
                {{-- Item 1 --}}
                <div class="support-item-modern">
                    <div class="icon-square">🌱</div>
                    <div class="content-area">
                        <h3 class="item-title">Self-Care & Education</h3>
                        <p class="item-desc">Maintain routines and improve awareness.</p>
                        <ul class="custom-list">
                            <li>Stress management techniques</li>
                            <li>Healthy sleep habits</li>
                            <li>Read mental health articles</li>
                        </ul>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="support-item-modern">
                    <div class="icon-square">📅</div>
                    <div class="content-area">
                        <h3 class="item-title">Periodic Monitoring</h3>
                        <p class="item-desc">
                            Consider repeating this screening next month to track any changes in your mood.
                        </p>
                    </div>
                </div>
            @endif

            {{-- === MODERATE RISK === --}}
            @if ($risk === 'moderate')
                {{-- Item 1 --}}
                <div class="support-item-modern">
                    <div class="icon-square">👩‍⚕️</div>
                    <div class="content-area">
                        <h3 class="item-title">Professional Support</h3>
                        <p class="item-desc">Consult a psychologist to prevent worsening symptoms.</p>
                        <ul class="custom-list">
                            <li>Clinical Psychologists</li>
                            <li>University Counseling Services</li>
                            <li>Tele-medicine Apps</li>
                        </ul>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="support-item-modern">
                    <div class="icon-square">🧘</div>
                    <div class="content-area">
                        <h3 class="item-title">Active Self-Care</h3>
                        <p class="item-desc">
                            Combine professional counseling with mindfulness & regular exercise.
                        </p>
                    </div>
                </div>
            @endif

            {{-- === HIGH RISK === --}}
            @if ($risk === 'high')
                {{-- Item 1 (URGENT) --}}
                <div class="support-item-modern urgent">
                    <div class="icon-square">🚑</div>
                    <div class="content-area">
                        <h3 class="item-title">Immediate Support Required</h3>
                        <p class="item-desc">Urgent professional help is strongly recommended.</p>
                        <ul class="custom-list">
                            <li>Psychiatrists or Specialists</li>
                            <li>Hospital Emergency (IGD)</li>
                            <li>Crisis Hotline (119)</li>
                        </ul>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="support-item-modern">
                    <div class="icon-square">🤝</div>
                    <div class="content-area">
                        <h3 class="item-title">Seek Assistance</h3>
                        <p class="item-desc">
                            Please do not keep this alone. Ask a trusted person to accompany you.
                        </p>
                    </div>
                </div>
            @endif

        </div>

        {{-- Tombol Home --}}
        <a href="{{ url('/') }}" class="btn-home-styled">
            Finish & Return Home
        </a>

        {{-- Disclaimer Kecil --}}
        <p style="text-align: center; font-size: 0.7rem; color: #94a3b8; margin-top: 1.5rem;">
            MeRS is not a medical diagnosis. In emergencies, contact authorities immediately.
        </p>

    </div>
    {{-- End Card --}}

</div>
@endsection
