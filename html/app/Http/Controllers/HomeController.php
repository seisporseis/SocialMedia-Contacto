<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //los que no estan logueador veran la pagina de login. 
    //Solo se ve las publicaciones de los usuarios que seguimos. 
    public function __construct()
    {
        $this->middleware('auth');
    }


    //ruta para controlador que solo tiene 1 metodo - cambia como lo llama en web.php
    public function __invoke()
    {
        
        $ids = auth()->user()->followings->pluck('id')->toArray() ;
        //esto lo trae desde la base de datos posts, **mirar el nombre user_id si esta igual
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
//Obtener a quienes seguimos - la informacion de la persona que estoy seguiendo en array
//pluck para traer solamente los campos que quiero (id)
//cada usuario terá un home diferente
//latest para ordenar que el ultimo post aparezca primero