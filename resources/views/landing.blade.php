@extends('layout.app')

@section('title', 'MeRS – Mental Routing System')

@section('content')
<div class="text-center max-w-2xl mx-auto">

    <h1 class="text-3xl font-semibold mb-4">
        You don’t have to figure this out alone.
    </h1>

    <p class="text-slate-600 mb-6 leading-relaxed">
        MeRS (Mental Routing System) is a digital screening platform that helps
        identify psychological risk levels and guides you to the most appropriate
        mental health support — safely, anonymously, and without judgment.
    </p>

    <div class="bg-white border rounded-lg p-6 mb-8 text-left">
        <ul class="space-y-3 text-slate-700">
            <li>• Uses clinically validated screening tools</li>
            <li>• Not a diagnosis or replacement for professionals</li>
            <li>• Your data is encrypted and stored for a limited time</li>
        </ul>
    </div>

    <a href="{{ url('/consent') }}"
       class="inline-block bg-slate-800 text-white px-8 py-3 rounded-md
              hover:bg-slate-700 transition">
        Start Screening
    </a>

    <p class="text-xs text-slate-500 mt-6">
        If you are in immediate danger, please contact local emergency services.
    </p>

</div>
@endsection
