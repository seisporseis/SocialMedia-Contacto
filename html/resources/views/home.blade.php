{{-- utilizando codigos repetidos --}}

@extends('layouts.app')
{{-- apunta direto para views. Usa '.' a lugar de '/' --}}


@section('titulo')
    Empieza a compartir tus snippets con tus seguidores
@endsection


@section('contenido')
{{-- x-  un componente de laravel / pasar la variable hacia el componente --}}
<div>
    <x-listar-post :posts="$posts" />
</div>
    
    

@endsection