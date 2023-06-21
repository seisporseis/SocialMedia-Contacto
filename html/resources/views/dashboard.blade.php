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
        <h2 class= "text-4xl text-center font-black my-10">Mis publicaciones</h2>
        @if ($posts->count())

        @foreach($posts as $post)
            <div class="bg-light-purple rounded-sm p-2 m-2">
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">

                    <h5 class="font-bold"> {{ $post->titulo }}</h5>
                    <p> {{ $post->descripcion}}</p>

                </a>
            </div>
        @endforeach

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
            @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
        @endif

    </section>
@endsection


