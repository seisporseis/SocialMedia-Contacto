<?php

namespace App\Http\Controllers;

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
        dd($user->id);
        
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
