@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
<div class=" md:full flex justify-center mb-2 gap-1">
    <a href="{{ route('posts.index', ['post' => $post, 'user' => $user]) }}">
        <p class="font-normal text-blue text-sm text-center italic">{{ $post->user->username }}</p>
    </a>
    
    <p class="text-sm font-extralight text-gray">posteó esto hace {{ $post->created_at->diffForHumans() }}</p>  
                    
</div>

<div class="container flex justify-center mx-auto md:flex">
    <div class="md:w-1/2 border border-gray rounded-lg shadow-md">

        <div class="bg-light-purple rounded-t-lg p-2">
            <h5 class="font-normal pl-5">{{ $post->titulo }}</h5>  
        </div>

        <div class="p-5">
            <pre class="flex justify-start text-sm text-gray">{{ $post->descripcion }}</pre>  
        </div>

    </div>
</div>

<div class="md:full flex flex-row justify-center mb-2 gap-2">
    @auth

        @if ($post->checkLike(auth()->user()))
            @php
                $Url = 'posts.likes.destroy';
                $ColorHeart = 'red';
            @endphp

        @else
            @php
                $Url = 'posts.likes.store';
                $ColorHeart = 'white';
            @endphp
        @endif

        <form action=" {{ route($Url, $post) }}" method="POST">
            @if ($Url === 'posts.likes.destroy')
                @method('DELETE')
            @endif
            @csrf
            <div class="my-4 ">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="{{ $ColorHeart }}"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            </div>
        </form>
    @endauth
    <p class="pt-4 font-bold">{{ $post->likes->count() }} <span class="font-thin">likes</span></p>
</div>

<div class="container flex justify-center mx-auto md:flex">
    <div class="md:w-1/2">
        <div class="p-5 m-10">

            @auth
                <p class="text-xl font-normal text-center mb-4">Comentarios</p>

                @if (session('mensaje'))
                    <div class="bg-green p-2 rounded-lg mb-6 text-white text-center font-normal">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block text-black font-normal">Deja tu comentario</label>
                        <textarea 
                        id="comentario" 
                        name="comentario" 
                        placeholder="ingresa tu comentario"
                        class="placeholder:font-thin placeholder:text-gray border p-3 w-full rounded-lg @error('comentario') border-red @enderror"></textarea>
                        @error('comentario')
                            <p class="bg-red text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <input type="submit" value="Comenta"
                        class="bg-blue hover:bg-gray-dark transition-colors cursor-pointer font-normal w-full p-3 text-light-purple rounded-lg">
                </form>
            @endauth

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if (optional($post->comentarios)->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray border-b">
                            <a class="font-bold"
                                    href="{{ route('posts.index', $comentario->user) }}">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray">
                                    {{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios para este post</p>
                    @endif
            </div>

        </div>
    </div>
</div>

           
@endsection
