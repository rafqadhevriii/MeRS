@extends('layout.app')

@section('content')
<div class="landing-page">
    <div class="main-wrapper">

        {{-- HERO SECTION --}}
        <section class="hero-section">
            <div class="content-container">
                <h1 class="main-title">
                    MENTAL ROUTING <br>
                    <span class="text-blue">SYSTEM</span>
                </h1>
                <p class="main-subtitle">
                    A self-assessment tool to help you understand your emotional well-being
                    and connect you with the right professional services accurately.
                </p>
            </div>
        </section>

        {{-- FEATURES --}}
        <section class="feature-section">
            <div class="feature-grid">

                <div class="feature-box">
                    <div class="icon-circle bg-green">
                        <img src="{{ asset('img/shield.png') }}">
                    </div>
                    <h3>Safe & Anonymous</h3>
                    <p>Your data is encrypted and automatically deleted after 30 days.</p>
                </div>

                <div class="feature-box">
                    <div class="icon-circle bg-yellow">
                        <img src="{{ asset('img/exclamation.png') }}">
                    </div>
                    <h3>Evidence-Based</h3>
                    <p>Utilizing clinically validated PHQ-9, GAD-7, and PCL-5 screening tools.</p>
                </div>

                <div class="feature-box">
                    <div class="icon-circle bg-pink">
                        <img src="{{ asset('img/user.png') }}">
                    </div>
                    <h3>Right Referral</h3>
                    <p>Get connected with trusted mental health professionals based on your needs.</p>
                </div>

            </div>
        </section>

        {{-- FOOTER CTA --}}
        <footer class="final-footer">
            <div class="wave-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#5B82B8" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>

            <div class="footer-blue-block">
                <div class="footer-content">

                    <h2 class="footer-heading">
                        Ready to check your emotional well-being?
                    </h2>

                    {{-- START SCREENING BUTTON --}}
                    <div style="margin-bottom: 30px;">
                        <a href="{{ url('/consent') }}" class="btn-white">
                            GET STARTED
                        </a>
                    </div>

                    {{-- TOKEN SECTION --}}
                    <div class="token-section">

                        <p style="color: white; margin-bottom: 12px; font-weight: 500;">
                            Already have a 30-day token?
                        </p>

                        <form action="{{ url('/enter-token') }}" method="POST"
                              style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                            @csrf

                            <input
                                type="text"
                                name="token"
                                value="{{ old('token') }}"
                                placeholder="MRS-XXXXXXXX"
                                style="
                                    padding: 12px 18px;
                                    border-radius: 8px;
                                    border: none;
                                    min-width: 260px;
                                    font-weight: 600;
                                    text-align: center;
                                    letter-spacing: 0.1em;
                                    text-transform: uppercase;
                                "
                            >

                            <button type="submit"
                                    style="
                                        background: transparent;
                                        border: 2px solid white;
                                        color: white;
                                        padding: 12px 22px;
                                        border-radius: 8px;
                                        cursor: pointer;
                                        transition: 0.2s ease;
                                    ">
                                REVIEW
                            </button>
                        </form>

                        {{-- ERROR MESSAGE --}}
                        @error('token')
                            <p style="color: #ffd4d4; margin-top: 10px; font-size: 0.9rem;">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <p class="copyright" style="margin-top: 40px;">
                        © 2026 MeRS - Mental Routing System.
                    </p>

                </div>
            </div>
        </footer>

    </div>
</div>
@endsection
