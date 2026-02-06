@extends('layout.app')

@section('title', 'PCL-5 Screening – MeRS')


<link rel="stylesheet" href="{{ asset('css/screening.css') }}">


@section('content')
<div class="screening-container theme-red">

    <div class="sticky-header">
        <div class="progress-track">
            <div class="track-bg"></div>
            <div id="dynamic-bar" class="track-fill" style="width: 66%;"></div>

            <div class="steps-wrapper">
                <div class="step-item done">
                    <div class="step-circle">✓</div>
                </div>

                <div class="step-item done">
                    <div class="step-circle" style="background-color: #f59e0b;">✓</div>
                </div>

                <div class="step-item active">
                    <div class="step-circle">3</div>
                    <span class="step-label">Impact</span>
                </div>

                <div class="step-item">
                    <div class="step-circle">🏁</div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-box">
        <h1 class="header-title">Trauma Impact (PCL-5)</h1>
        <p class="header-desc">
            In the past <strong>month</strong>, how much have you been bothered by these problems?
        </p>
    </div>

    <form action="{{ url('/screening/pcl5') }}" method="post">
    @csrf
        @php
            $questions = [
                'Repeated, disturbing, and unwanted memories of the stressful experience.',
                'Repeated, disturbing dreams of the stressful experience.',
                'Suddenly feeling or acting as if the stressful experience were happening again.',
                'Feeling very upset when something reminded you of the stressful experience.',
                'Having strong physical reactions when reminded of the stressful experience.',
                'Avoiding memories, thoughts, or feelings related to the stressful experience.',
                'Avoiding external reminders (people, places, activities, situations).',
                'Trouble remembering important parts of the stressful experience.',
                'Strong negative beliefs about yourself, others, or the world.',
                'Blaming yourself or others for the stressful experience.',
                'Persistent negative emotional state (fear, anger, guilt, shame).',
                'Loss of interest in activities you used to enjoy.',
                'Feeling distant or cut off from other people.',
                'Difficulty experiencing positive emotions.',
                'Irritable behavior or angry outbursts.',
                'Risky or self-destructive behavior.',
                'Being “super alert,” watchful, or on guard.',
                'Feeling jumpy or easily startled.',
                'Difficulty concentrating.',
                'Trouble falling or staying asleep.'
            ];
            $options = [0 => 'Not at all', 1 => 'A little bit', 2 => 'Moderately', 3 => 'Quite a bit', 4 => 'Extremely'];
        @endphp

        <div class="questions-list">
            @foreach ($questions as $index => $question)
                <div class="question-card">
                    <p class="question-text">{{ $index + 1 }}. {{ $question }}</p>

                    <div class="options-grid cols-3">
                        @foreach ($options as $value => $label)
                            <label class="radio-label">
                                <input type="radio" name="q{{ $index }}" value="{{ $value }}" required class="sr-only-input input-radio">
                                <div class="option-box">{{ $label }}</div>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="btn-wrapper">
            <a href="{{ url('/screening/gad7') }}" class="btn-back">← Back</a>
            <button type="submit" class="btn-next">Finish & Submit</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const radios = document.querySelectorAll('.input-radio');
        const progressBar = document.getElementById('dynamic-bar');
        const totalQuestions = {{ count($questions) }};

        const startPercent = 66;
        const rangePercent = 34;

        function updateProgress() {
            const answered = new Set();
            radios.forEach(r => { if(r.checked) answered.add(r.name); });
            const localProgress = answered.size / totalQuestions;
            progressBar.style.width = (startPercent + (localProgress * rangePercent)) + '%';
        }
        radios.forEach(radio => radio.addEventListener('change', updateProgress));
        updateProgress();
    });
</script>
@endsection
