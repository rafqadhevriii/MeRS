@extends('layout.app')

@section('content')
<div class="landing-page">
    <div class="main-wrapper">
        <section class="hero-section">
            <div class="content-container">
                <h1 class="main-title">MENTAL ROUTING <br><span class="text-blue">SYSTEM</span></h1>
                <p class="main-subtitle">
                    Asesmen mandiri untuk memahami tingkat gejala emosional dan menemukan layanan profesional yang sesuai secara akurat.
                </p>
            </div>
        </section>

        <section class="feature-section">
            <div class="feature-grid">
                <div class="feature-box">
                    <div class="icon-circle bg-green">
                        <img src="{{ asset('img/shield.png') }}">
                    </div>
                    <h3>Aman & Anonim</h3>
                    <p>Data dienkripsi, mode anonim tersedia untuk privasi penuh.</p>
                </div>

                <div class="feature-box">
                    <div class="icon-circle bg-yellow">
                        <img src="{{ asset('img/exclamation.png') }}">
                    </div>
                    <h3>Evidence-Based</h3>
                    <p>Menggunakan instrumen PHQ-9 & GAD-7 yang tervalidasi klinis.</p>
                </div>

                <div class="feature-box">
                    <div class="icon-circle bg-pink">
                        <img src="{{ asset('img/user.png') }}">
                    </div>
                    <h3>Rujukan Tepat</h3>
                    <p>Terhubung langsung dengan tenaga profesional terpercaya.</p>
                </div>
            </div>
        </section>

        <footer class="final-footer">

            <div class="wave-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#5B82B8" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>

            <div class="footer-blue-block">
                <div class="footer-content">
                    <h2 class="footer-heading">Mulai cek kondisi emosional Anda?</h2>
                    <div class="btn-group">
                        <a href="{{ url('/consent') }}" class="btn-white">MULAI SEKARANG</a>
                        <a href="{{ url('/login') }}" class="btn-outline">LOGIN</a>
                    </div>
                    <p class="copyright">© 2026 MeRS - Mental Routing System.</p>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
