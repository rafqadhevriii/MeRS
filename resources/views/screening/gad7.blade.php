@extends('layout.app')

@section('title', 'GAD-7 Screening – MeRS')

@section('content')
<div class="max-w-3xl mx-auto">

    <h1 class="text-2xl font-semibold mb-2">
        GAD-7 Screening
    </h1>

    <p class="text-slate-600 mb-6 leading-relaxed">
        Over the last <strong>two weeks</strong>, how often have you been bothered
        by the following problems related to anxiety?
    </p>

    <form action="{{ url('/screening/gad7') }}" method="post">
    @csrf

        @php
            $questions = [
                'Feeling nervous, anxious, or on edge',
                'Not being able to stop or control worrying',
                'Worrying too much about different things',
                'Trouble relaxing',
                'Being so restless that it is hard to sit still',
                'Becoming easily annoyed or irritable',
                'Feeling afraid as if something awful might happen'
            ];

            $options = [
                0 => 'Not at all',
                1 => 'Several days',
                2 => 'More than half the days',
                3 => 'Nearly every day'
            ];
        @endphp

        <div class="space-y-6">

            @foreach ($questions as $index => $question)
                <div class="bg-white border rounded-lg p-4">
                    <p class="font-medium mb-3">
                        {{ $index + 1 }}. {{ $question }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        @foreach ($options as $value => $label)
                            <label class="flex items-center gap-2 text-sm">
                                <input type="radio"
                                       name="q{{ $index }}"
                                       value="{{ $value }}"
                                       required
                                       class="text-slate-700">
                                {{ $label }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>

        <div class="flex justify-between items-center mt-8">
            <a href="{{ url('/screening/phq9') }}"
               class="text-sm text-slate-600 hover:underline">
                ← Back
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-md bg-slate-800 text-white
                           hover:bg-slate-700 transition">
                Continue
            </button>
        </div>

    </form>

</div>
@endsection
