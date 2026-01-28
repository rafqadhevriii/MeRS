@extends('layout.app')

@section('title', 'Informed Consent – MeRS')

@section('content')
<div class="max-w-3xl mx-auto">

    <h1 class="text-2xl font-semibold mb-4">
        Informed Consent
    </h1>

    <p class="text-slate-600 mb-6 leading-relaxed">
        Before continuing, please read the information below carefully.
        This screening is designed to support early detection and appropriate
        referral — not to provide a medical diagnosis.
    </p>

    <div class="bg-white border rounded-lg p-6 space-y-4 text-slate-700">

        <div>
            <h2 class="font-semibold mb-1">Purpose of MeRS</h2>
            <p class="text-sm">
                MeRS helps identify psychological risk levels using standardized
                screening tools and guides users toward suitable mental health services.
            </p>
        </div>

        <div>
            <h2 class="font-semibold mb-1">Data Protection</h2>
            <p class="text-sm">
                Your responses are encrypted and stored securely for a maximum of
                30 days before being automatically deleted. Personal identifiers
                are not required to complete this screening.
            </p>
        </div>

        <div>
            <h2 class="font-semibold mb-1">Limitations</h2>
            <p class="text-sm">
                This screening does not replace professional diagnosis or treatment.
                If high-risk indicators are detected, you may be guided toward
                professional or emergency services.
            </p>
        </div>

        <div>
            <h2 class="font-semibold mb-1">Emergency Situations</h2>
            <p class="text-sm">
                If you are currently experiencing thoughts of self-harm or feel
                unsafe, please seek immediate help from local emergency services.
            </p>
        </div>

    </div>

    <form action="{{ url('/screening/phq9') }}" method="get" class="mt-6">

        <div class="flex items-start mb-6">
            <input type="checkbox" id="agree" required
                   class="mt-1 mr-3 rounded border-slate-300">
            <label for="agree" class="text-sm text-slate-700">
                I have read and understood the information above, and I voluntarily
                agree to proceed with the screening.
            </label>
        </div>

        <div class="flex gap-4">
            <a href="{{ url('/') }}"
