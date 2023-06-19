<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //cuenta para usuario protegida con autenticacion, ejecutado antes del index
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
        ]);

        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request ->descripcion,
        //     'user_id' => auth() -> user() ->id
        // ]);

        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request ->descripcion,
            'user_id' => auth() -> user() ->id
        ]);

        return redirect()->route('posts.index', auth()->user()->name);
    }
}
