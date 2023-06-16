<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //si el usuario no esta autenticado. 
        // with - rellenar los valores que tengo en la session (if en blade) - pasando datos a la vista. 
        // back - para volver a pagina anterior
        if(!auth()->attempt($request->only('email', 'password'), $request->remember )) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        //si retorna true
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
// $request -> remember = compara si es el mismo, si positivo, mantiene el usuario conectado - Cookie. En la base de datos se ve llenado en 'token'