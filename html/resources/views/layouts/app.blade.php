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
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo-contacto-purple.png') }}" alt="LogoContacto">
                </a>    
            @auth
                <nav class="flex gap-5 items-center">
                    <a href="{{ route('posts.create')}}" class="flex items-center gap-1 bg-yellow border hover:bg-yellow-dark p-2 text-purple rounded text-xs font-normal cursor pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                        Publicar
                    </a>
            
                    <a href="{{ route('posts.index', auth()->user()->username ) }}" class="text-purple max-[320px]:text-white text-sm">
                        Hola
                        <span class="font-thin underline">
                            {{ auth()->user()->username }}
                        </span>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                    @csrf
                        <button type="submit" class="text-purple max-[320px]:text-white text-sm">
                            Cerrar sesión 
                        </button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-5 items-center">
                    <a class=" text-purple max-[320px]:text-white text-sm" href="{{ route('login') }}">Login</a>
                    <a class=" text-purple max-[320px]:text-white text-sm" href="{{ route('register') }}">Crea tu cuenta</a>
                </nav>
            @endguest
            
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-bold text-center text-2xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-black font-light">
            ConTacto - Compartir código nunca fue tan fácil.
            {{ now()->year }}
        </footer>
    </body>
</html>