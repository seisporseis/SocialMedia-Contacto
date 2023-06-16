@extends('layouts.app')

@section('titulo')
    Registrate en ConTacto
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10">
        <div class="md:w-5/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <img class="mx-auto" src="{{ asset('img/logo-contacto-img.png') }}" alt="Logo-contacto">
                    <h2 class="uppercase text-xl font-bold text-center">Crea tu cuenta</h2>
                    <p class="font-extralight text-zinc-900 text-center">¡Y empieza a compartir tus mejores snippets!</p>
                </div>

                <div class="mb-5">
                    <label for="name" class="mb-2 block text-slate-950 font-bold">
                        Nombre
                    </label>
                    <input 
                        id="name"
                        name="name"
                        placeholder="tu nombre"
                        type="text"
                        class="border p-3 w-full rounded-lg  @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                    
                        />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div> -->

                <div class="mb-5">
                    <label for="email" class="mb-2 block text-slate-950 font-bold">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        placeholder="example@mail.com"
                        type="email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block text-slate-950 font-bold">
                        Password
                    </label>
                    <input 
                        id="password"
                        name="password"
                        placeholder="mínimo 8 carácteres"
                        type="password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input 
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu Password"
                        class="border p-3 w-full rounded-lg"
                    />
                    {{-- "confirmation" en id / name es un nombre obligatorio para validacion --}}
                </div> -->

                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-yellow-300 hover:bg-yellow-400 transition-colors cursor-pointer font-bold w-full p-3 text-purple-400 rounded-lg"
                />

            </form>
        </div>

        <div class="md:w-5/12 bg-violet-400 rounded-lg">
            <img class="object-cover" src="{{asset('img/bg-contacto.png') }}" alt="Imagen registro usuarios">
        </div>

    </div>
@endsection