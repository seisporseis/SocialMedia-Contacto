@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.png') }}" alt="imagen usuario" width="220" height="105">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <p class="text-gray-dark text-3xl">{{ $user->username }}</p>
                
                <p class="text-gray text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Posts</span>
                </p>
            </div>

        </div>
    </div>


    <section class="container mx-auto mt-10">
        <h2 class= "text-4xl text-center font-black my-10">Publicaciones</h2>

        @foreach($posts as $post)
            <div>
            </div>
        @endforeach

            <div class="my-10">
                {{ $posts->links() }} 
            </div>

    </section>
@endsection