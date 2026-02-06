<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeRS - Mental Routing System</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-heading { font-family: 'Nunito', sans-serif; }
        .font-body { font-family: 'Poppins', sans-serif; }
        .floating { animation: float 3s ease-in-out infinite; }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-[#FBFDFF] font-body text-[#1E293B] antialiased overflow-x-hidden">

    <div class="fixed top-8 right-8 md:top-12 md:right-16 z-50">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-12 md:w-16 h-auto drop-shadow-md">
    </div>

    <main>
        @yield('content')
    </main>

</body>
</html>
