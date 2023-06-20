<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //carga una vista .blade
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        // dd($request); //imprime todos los datos digitados
        // dd($request->get('username')); //imprime solamente lo que pido en get
    
        //Modificar el Request - para salir el error de duplicacion del username en el formulario, no un error de laravel.
        $request->request->add(['username' => Str::slug($request->username)]);


        //validacion
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:8'
        ]);

        // INSERT INTO usuarios
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Autenticar un usuario - Attempt intenta identificar un usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        
        //Otra manera de autenticar el usuario
        auth()->attempt($request->only('email', 'password'));

        //Redireccionar
        return redirect()->route('posts.store', auth()->user()->username);

    
    }

}
