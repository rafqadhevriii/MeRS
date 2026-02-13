@extends('layout.app')

@section('title', 'Review Previous Screening – MeRS')

@section('content')
<div class="result-page-wrapper">

    <div class="result-main-card">

        <h1 class="result-main-title">Enter Your Screening Token</h1>
        <p class="result-subtitle">
            Please enter the 30-day token you received after completing your screening.
        </p>

        <form method="POST" action="{{ url('/enter-token') }}">
            @csrf

            <input
                type="text"
                name="token"
                placeholder="MRS-XXXXXXXX"
                style="width:100%; padding:1rem; border-radius:0.75rem; border:1px solid #cbd5e1; margin-bottom:1rem;"
            >

            <button type="submit" class="btn-result-primary">
                Review Result
            </button>
        </form>

    </div>

</div>
@endsection
