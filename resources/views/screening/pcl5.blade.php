@extends('layout.app')

@section('title', 'PCL-5 Screening – MeRS')

@section('content')
<div class="max-w-3xl mx-auto">

    <h1 class="text-2xl font-semibold mb-2">
        PCL-5 Screening
    </h1>

    <p class="text-slate-600 mb-6 leading-relaxed">
        In the past <strong>month</strong>, how much were you bothered by the following
        problems related to stressful or traumatic experiences?
    </p>

    <form action="{{ url('/screening/pcl5') }}" method="post">
    @csrf

        @php
            $questions = [
                'Repeated, disturbing memories or thoughts of a stressful experience',
                'Repeated, disturbing dreams related to a stressful experience',
                'Suddenly feeling or acting as if the stressful experience were happening again',
                'Feeling very upset when something reminded you of a stressful experience',
                'Having strong physical reactions when reminded of a stressful experience',
                'Avoiding memories, thoughts, or feelings related to the experience',
                'Avoiding external reminders of the experience',
                'Trouble remembering important parts of the experience',
                'Strong negative beliefs about yourself or the world',
                'Blaming yourself or others for the experience',
                'Strong negative emotions such as fear, anger, guilt, or shame',
                'Loss of interest in activities you used to enjoy',
                'Feeling distant or cut off from others',
                'Trouble experiencing positive feelings',
                'Irritable behavior or angry outbursts',
                'Taking too many risks or doing things that could cause harm',
                'Being overly alert or watchful',
                'Feeling jumpy or easily startled',
                'Difficulty concentrating',
                'Trouble falling or staying asleep'
            ];

            $options = [
                0 => 'Not at all',
                1 => 'A little bit',
                2 => 'Moderately',
                3 => 'Quite a bit',
                4 => 'Extremely'
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
            <a href="{{ url('/screening/gad7') }}"
               class="text-sm text-slate-600 hover:underline">
                ← Back
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-md bg-slate-800 text-white
                           hover:bg-slate-700 transition">
                Finish Screening
            </button>
        </div>

    </form>

</div>
@endsection
