@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
        <p class="font-bold">LO QUE SEA</p>
    </div>
</div>

@endsection
