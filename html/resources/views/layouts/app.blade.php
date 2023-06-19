<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>ConTacto - @yield('titulo')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-white font-sans max-[320px]:bg-purple">
        <header class="p-5 bg-white max-[320px]:bg-purple ">
            <div class="container mx-auto flex justify-between">
                <img src="{{ asset('img/logo-contacto-purple.png') }}" alt="LogoContacto">

                <nav class="flex gap-5 items-center">
                    <a class=" text-purple max-[320px]:text-white text-sm" href="#">Login</a>
                    <a class=" text-purple max-[320px]:text-white text-sm" href="{{ route('register') }}">Crea tu cuenta</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <!-- <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2> -->
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-black font-light">
            ConTacto - Compartir código nunca fue tan fácil.
            {{ now()->year }}
        </footer>
    </body>
</html>