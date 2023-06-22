@extends('layouts.app')


@section('contenido')

    <div class="flex justify-center">
        <div class="border border-light-purple rounded-lg shadow-xl w-full pl-20 md:w-6/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="lg:w-6/12">
                <img class="rounded-full bg-purple" src="{{ asset('img/usuario.png') }}" alt="imagen usuario" width="120" height="60">   
            </div>

            <div class=" lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-5 md:py-10">
                <p class="font-thin">Mi perfil</p> 
                <p class="text-gray-dark text-2xl">{{ $user->name }}</p>   
                <p class="text-gray-dark font-thin italic text-sm">@ {{ $user->username }}</p>  
                
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                
                <p class="text-gray text-sm mb-3 font-bold mt-5">
                    100
                    <span class="font-thin">Seguidores</span>
                </p>
                <p class="text-gray text-sm mb-3 font-bold">
                    80
                    <span class="font-thin">Siguiendo</span>
                </p>
                <p class="text-gray text-sm mb-3 font-bold">
                {{ $posts->count() }}
                    <span class="font-thin">Posts</span>
                </p>

                <a href="{{ route('posts.create')}}" class="flex items-center gap-1 bg-yellow border hover:bg-yellow-dark p-2 text-purple rounded text-xs font-normal cursor pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                        Publicar
                    </a>
            </div>

        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class= "text-4xl text-center font-black my-10">Mis publicaciones</h2>

        @if ($posts->count())
    <div class="grid grid-cols-2 grid-flow-row gap-5 p-10">
        @foreach($posts as $post)
        <div class="shadow-xl border border-gray rounded-lg">
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                <div class="bg-light-purple rounded-t-lg p-2">
                  <h5 class="font-normal pl-5">{{ $post->titulo }}</h5>  
                </div>
                <div class="p-5">
                  <pre class="flex justify-start text-sm font-extralight text-gray">{{ $post->descripcion }}</pre>  
                </div>
                
                
            </a>
        </div>
        @endforeach
    </div>

    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>
    @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
    @endif
</section>

@endsection


