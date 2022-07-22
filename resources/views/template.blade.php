<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto web</title>
    <!--Importar assets para Laravel Mix
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    -->
</head>
<body>
    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" class="h-12">
                </a>
                <form action="{{ route('home') }}" method="GET" class="flex-grow">
                    <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}" class="border border-gray-200 rounded py-2 px-4 w-1/2">
                </form>
            </div>

            @auth
            <!--Si ha iniciado sesión-->
            <a href="{{route('dashboard')}}">Dashboard</a>
            @else
            <!--Si no ha iniciado sesión-->
            <a href="{{route('login')}}">Login</a>
            @endauth
        </header>
        <!--clases de Tailwind-->
        <div class="opacity-60 h-px mb-8" style="
            background: linear-gradient(to right,
            rgba(200, 200, 200, 0) 0%,
            rgba(200, 200, 200, 1) 30%,
            rgba(200, 200, 200, 1) 70%,
            rgba(200, 200, 200, 0) 100%
            );
            ">
            
        </div>

        @yield('content')
        
        <p class="py-16">
            <img src="{{ asset('images/logo.png') }}" class="h-12 mx-auto">
        </p>
    </div>

    <!--importando assets-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</body>
</html>