@extends('layouts.app')

@section('titulo')
    Crear una nueva publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <!-- <div class="md:w-1/2 px-10">
            imagen aqui
        </div> -->

        <div class="mx-auto md:w-1/2 p-10 rounded-lg border-2 mt-10 md:mt-0">
            <form action="{{ route('posts.create') }}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block text-dark-gray font-normal">
                        Titulo
                    </label>
                    <input 
                        id="titulo"
                        name="titulo"
                        placeholder="Dale un nombre a tu snippet"
                        type="text"
                        class="placeholder:font-thin border border-gray p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                    
                        />
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block text-dark-gray font-normal">
                        Descripción
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Copia aquí tu código"
                        class="border border-gray p-4 w-full rounded-lg @error('name') border-red-500 @enderror"
                    >
                    {{ old('descripcion') }}
                    </textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input 
                type="submit"
                value="Publicar"
                class="bg-yellow hover:bg-yellow-dark transition-colors cursor-pointer font-bold w-full p-3 text-purple rounded-lg"
                />

            </form>
        </div>
    </div>


@endsection