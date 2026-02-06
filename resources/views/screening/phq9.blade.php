@extends('layout.app')

@section('title', 'PHQ-9 Screening – MeRS')


<link rel="stylesheet" href="{{ asset('css/screening.css') }}">


@section('content')
<div class="screening-container theme-emerald">

    <div class="sticky-header">
        <div class="progress-track">
            <div class="track-bg"></div>
            <div id="dynamic-bar" class="track-fill" style="width: 0%;"></div>

            <div class="steps-wrapper">
                <div class="step-item active">
                    <div class="step-circle">1</div>
                    <span class="step-label">Mood</span>
                </div>
                <div class="step-item">
                    <div class="step-circle">2</div>
                </div>
                <div class="step-item">
                    <div class="step-circle">3</div>
                </div>
                <div class="step-item">
                    <div class="step-circle">🏁</div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-box">
        <h1 class="header-title">Mood Check (PHQ-9)</h1>
        <p class="header-desc">
            Over the last <strong>two weeks</strong>, how often have you been bothered by these problems?
        </p>
    </div>

    <form action="{{ url('/screening/phq9') }}" method="post">
    @csrf
        @php
            $questions = [
                'Little interest or pleasure in doing things.',
                'Feeling down, depressed, or hopeless.',
                'Trouble falling or staying asleep, or sleeping too much.',
                'Feeling tired or having little energy.',
                'Poor appetite or overeating.',
                'Feeling bad about yourself — or that you are a failure.',
                'Trouble concentrating on things.',
                'Moving or speaking so slowly OR being so fidgety/restless.',
                'Thoughts that you would be better off dead or of hurting yourself.'
            ];
            $options = [0 => 'Not at all', 1 => 'Several days', 2 => 'More than half the days', 3 => 'Nearly every day'];
        @endphp

        <div class="questions-list">
            @foreach ($questions as $index => $question)
                <div class="question-card">
                    <p class="question-text">{{ $index + 1 }}. {{ $question }}</p>
                    <div class="options-grid">
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

        <div class="btn-wrapper end">
            <button type="submit" class="btn-next">Next Step →</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const radios = document.querySelectorAll('.input-radio');
        const progressBar = document.getElementById('dynamic-bar');
        const totalQuestions = {{ count($questions) }};

        const startPercent = 0;
        const rangePercent = 33;

        function updateProgress() {
            const answered = new Set();
            radios.forEach(r => { if(r.checked) answered.add(r.name); });
            const localProgress = answered.size / totalQuestions;
            progressBar.style.width = (startPercent + (localProgress * rangePercent)) + '%';
        }
        radios.forEach(radio => radio.addEventListener('change', updateProgress));


    });
</script>
@endsection
