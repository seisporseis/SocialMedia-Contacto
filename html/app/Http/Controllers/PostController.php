<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //cuenta para usuario protegida con autenticacion, ejecutado antes del index
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }
    
    public function index(User $user)
    {
        
        $posts = Post::where('user_id', $user->id)->paginate(4);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
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
        //      'titulo' => $request->titulo,
        //      'descripcion' => $request ->descripcion,
        //      'user_id' => auth() -> user() ->id
        //  ]);

        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request ->descripcion,
            'user_id' => auth() -> user() ->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view("posts.show", [
            'post' => $post, 
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post); //Ejecuto una policy para determinar si el usuario es dueño del post
        $post->delete(); // si es el dueño, entonces lo elimino

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
