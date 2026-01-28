<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'MeRS – Mental Routing System')</title>

    {{-- Vite + Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    {{-- Header --}}
    <header class="w-full border-b bg-white">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="text-lg font-semibold tracking-wide">
                MeRS
            </div>
            <div class="text-sm text-slate-500">
                Mental Routing System
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="flex-1">
        <div class="max-w-5xl mx-auto px-4 py-10">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="border-t bg-white">
        <div class="max-w-5xl mx-auto px-4 py-4 text-center text-sm text-slate-500">
            © {{ date('Y') }} MeRS — Early Detection, Proper Direction
        </div>
    </footer>

</body>
</html>
