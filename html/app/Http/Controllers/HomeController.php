<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    

    public function index()
{
    $posts = \App\Models\Post::all(); // Obtén los posts desde tu modelo o fuente de datos
    
    return view('home', compact('posts'));
}

}