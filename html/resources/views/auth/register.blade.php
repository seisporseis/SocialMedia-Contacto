@extends('layouts.app')

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10">
        <div class="md:w-5/12 p-6">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <img class="mx-auto" src="{{ asset('img/logo-contacto-img.png') }}" alt="Logo-contacto">
                    <h2 class="uppercase text-xl font-bold text-center">Crea tu cuenta</h2>
                    <p class="font-extralight text-zinc-900 text-center">¡Y empieza a compartir tus mejores snippets!</p>
                </div>

                <div class="mb-5">
                    <label for="name" class="mb-2 block text-gray-dark font-bold">
                        Nombre
                    </label>
                    <input 
                        id="name"
                        name="name"
                        placeholder="tu nombre"
                        type="text"
                        class="placeholder:text-gray placeholder:font-thin placeholder:text-sm border border-gray p-3 w-full rounded-lg  @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                    
                        />
                    @error('name')
                        <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block text-gray-dark font-bold">
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        placeholder="elige tu nombre de usuario"
                        type="text"
                        class="placeholder:text-gray placeholder:font-thin placeholder:text-sm border border-gray p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                    <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block text-gray-dark font-bold">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        placeholder="example@mail.com"
                        type="email"
                        class="placeholder:text-gray placeholder:font-thin placeholder:text-sm border border-gray p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
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
                        placeholder="mínimo 8 carácteres"
                        type="password"
                        class="placeholder:text-gray placeholder:font-thin placeholder:text-sm border border-gray p-3 w-full rounded-lg @error('password') @enderror"
                    />
                    @error('password')
                    <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block text-gray-dark font-bold">
                        Repetir Contraseña
                    </label>
                    <input 
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="repite tu contraseña"
                        class="placeholder:text-gray placeholder:font-thin placeholder:text-sm border border-gray p-3 w-full rounded-lg"
                    />
                    {{-- "confirmation" en id / name es un nombre obligatorio para validacion --}}
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember">
                    <label class="text-gray-dark text-sm">Acepto las políticas y términos de privacidad</label>
                </div>

                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-yellow hover:bg-yellow-dark transition-colors cursor-pointer font-bold w-full p-3 text-purple-400 rounded-lg"
                />

            </form>
        </div>

        <div class="max-[320px]:hidden md:w-5/12 bg-purple rounded-lg">
            <img class="bg-cover bg-center" src="{{asset('img/bg-contacto.png') }}" alt="Imagen registro usuarios">
        </div>

    </div>
@endsection