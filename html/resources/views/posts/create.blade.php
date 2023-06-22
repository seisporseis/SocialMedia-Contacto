@extends('layouts.app')

@section('contenido')
    <div class="md:flex md:items-center">

        <div class="mx-auto md:w-1/2 p-10 rounded-lg border mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block text-gray">
                        Nombra tu snippet
                    </label>
                    <input 
                        id="titulo"
                        name="titulo"
                        placeholder="¿De qué se trata lo que vas a compartir?"
                        type="text"
                        class="placeholder:font-thin focus:border-purple border p-3 w-full rounded-lg @error('name') border-red @enderror"
                        value="{{ old('titulo') }}"
                    
                        />
                    @error('titulo')
                        <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block text-gray">
                        Pon aquí tu código
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('name') border-red @enderror"
                    >
                    {{ old('titulo') }}
                    </textarea>
                    @error('descripcion')
                        <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <input 
                    type="submit"
                    value="Publicar"
                    class="bg-yellow hover:bg-yellow-dark transition-colors cursor-pointer font-normal border border-purple p-3 text-purple py-2 px-6 mr-4 rounded-lg"
                    />
                </div>
                
               

            </form>
        </div>
    </div>


@endsection