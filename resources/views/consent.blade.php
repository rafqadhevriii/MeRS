@extends('layout.app')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


@section('title', 'Informed Consent – MeRS')

@section('content')
<div class="screening-wrapper">
    <div class="consent-card">

        <div class="card-header">
            <h1>Informed Consent</h1>
            <p>Please read the following information carefully before proceeding to the screening.</p>
        </div>

        <div class="card-body">

            <div class="info-list">
                <div class="info-item">
                    <div class="icon-box blue">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="info-text">
                        <h2>Purpose of MeRS</h2>
                        <p>MeRS helps identify psychological risk levels using standardized screening tools.</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="icon-box green">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <div class="info-text">
                        <h2>Data Protection</h2>
                        <p>Your responses are anonymous and stored securely for a limited time.</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="icon-box yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div class="info-text">
                        <h2>Limitations</h2>
                        <p>This is a screening tool, not a medical diagnosis.</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="icon-box pink">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <div class="info-text">
                        <h2>Emergency</h2>
                        <p>If you feel unsafe, please seek professional help immediately.</p>
                    </div>
                </div>
            </div>

            <form action="{{ url('/screening/phq9') }}" method="get">
                <div class="agreement-box">
                    <label class="checkbox-label">
                        <input type="checkbox" id="agree" required>
                        <span class="checkbox-text">
                            I have read, understood, and agree to proceed.
                        </span>
                    </label>
                </div>

                <div class="btn-action-group">
                    <a href="{{ url('/') }}" class="btn-mers btn-mers-secondary">Cancel</a>
                    <button type="submit" class="btn-mers btn-mers-primary">
                        Start Screening
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
