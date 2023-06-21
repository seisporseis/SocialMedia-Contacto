@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
<div class="container mx-auto md:flex">
    <a href="{{ route('posts.index', ['post' => $post, 'user' => $user]) }}">
        <div class="md:w-1/2 mx-auto p-10 rounded-lg border mt-10 md:mt-0">
            <h5 class="font-bold"> {{ $post->titulo }}</h5>
            <p class="rounded-lg border mt-2 md:mt-0 p-10">{{ $post->descripcion }}</p>

            <div class="py-5 text-xs">
                <p>0 Likes</p>
            </div>

            <div>
                <p class="m-0 bg-yellow hover:bg-yellow-dark transition-colors cursor-pointer font-bold w-full p-3 text-purple-400 rounded-lg">{{ $post->user->username }}</p>
                <p class="m-2 text-sm text-gray">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </a>
</div>

@endsection
