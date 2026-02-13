<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
            <link rel="stylesheet" href="{{ asset('css/welcome-hero.css') }}">
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <!-- Navigation Header -->
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Main Content -->
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-5xl lg:flex-row items-center">
                <!-- Left: Text Content -->
                <section class="text-[14px] leading-[20px] flex-1 p-6 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.08)] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                    <h1 class="text-4xl lg:text-6xl font-medium leading-tight text-[#0b5fef]" style="font-family: 'Instrument Sans', system-ui, sans-serif;">We Care For Your Health</h1>
                    <p class="mt-4 mb-6 text-lg text-[#606060] dark:text-[#A1A09A]">Comprehensive, compassionate care — book an appointment with our specialists today.</p>

                    <div class="flex gap-4 items-center">
                        <a href="#" class="hero-cta-primary inline-block px-6 py-3 rounded-lg text-white font-medium">Get an Appointment</a>
                        <a href="#" class="hero-cta-secondary inline-block px-5 py-3 rounded-lg border border-[#0b5fef] text-[#0b5fef] font-medium">Learn More</a>
                    </div>

                    <ul class="flex gap-4 mt-8 text-sm text-[#6f6f6f]">
                        <li class="inline-flex items-center gap-2">Experienced Doctors</li>
                        <li class="inline-flex items-center gap-2">24/7 Support</li>
                    </ul>
                </section>

                <!-- Right: Visual / Illustration -->
                <aside class="relative lg:w-[520px] w-full shrink-0 overflow-visible lg:overflow-hidden lg:rounded-r-lg lg:rounded-t-none mt-6 lg:mt-0">
                    <div class="hero-bg absolute inset-0 -z-10"></div>
                    <div class="hero-card relative mx-auto w-[360px] lg:w-[460px] p-6 lg:p-8 rounded-2xl bg-white shadow-3d">
                        <img src="{{ asset('img/hero-doctor.png') }}" alt="Doctor" class="block w-full h-auto rounded-xl object-cover">
                    </div>
                    @include('welcome-illustrations')
                </aside>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
