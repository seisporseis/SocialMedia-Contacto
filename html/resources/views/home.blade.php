{{-- utilizando codigos repetidos --}}

@extends('layouts.app')
{{-- apunta direto para views. Usa '.' a lugar de '/' --}}


@section('titulo')
    Pagina principal
@endsection


@section('contenido')
{{-- x-  un componente de laravel / pasar la variable hacia el componente --}}
    <x-listar-post :posts="$posts" />

@endsection