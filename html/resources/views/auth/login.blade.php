@extends('layouts.app')

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-5/12 p-6">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="mb-5">
                    <img class="mx-auto" src="{{ asset('img/logo-contacto-img.png') }}" alt="Logo-contacto">
                    <h2 class="uppercase text-xl font-bold text-center">Inicia sesión</h2>
                    <p class="font-extralight text-zinc-900 text-center">Bienvenido/a, ingresa tus datos para iniciar sesión</p>
                </div>

                {{-- si houver error en el cadastro, mostrará el mensaje del loginController --}}
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif


                <div class="mb-5">
                    <label for="email" class="mb-2 block text-gray-dark font-bold">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        placeholder="Ingresa tu email"
                        type="email"
                        class="placeholder:text-gray placeholder:font-thin placeholder:text-sm border p-3 w-full rounded-lg @error('email') border-red @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                    <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="password" class="mb-2 block text-gray-dark font-bold">
                        Contraseña
                    </label>
                    <input 
                        id="password"
                        name="password"
                        placeholder="Ingresa tu contraseña"
                        type="password"
                        class="placeholder:text-gray placeholder:font-thin placeholder:text-sm border border-gray p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                    <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember">
                    <label class="text-gray-dark text-sm">Recuérdame</label>
                </div>


                <input 
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-yellow hover:bg-yellow-dark transition-colors cursor-pointer font-bold w-full p-3 text-purple-400 rounded-lg"
                />

            </form>
        </div>

        <div class=" max-[320px]:hidden md:w-5/12 bg-purple rounded-lg">
            <img class="object-cover" src="{{asset('img/bg-contacto.png') }}" alt="Imagen registro usuarios">
        </div>

    </div>
@endsection