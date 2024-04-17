<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    
    public function store(Request $request)
    {        
        $validated = $request->validate([
           'email' => 'required|email',
           'password' => 'required' 
        ]);
        
        // si no coinciden las credenciales
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
          return back()->with('mensaje', 'Credenciales Incorrectas');
        }
        
        return redirect()->route('posts.index', [
            'user' => auth()->user()->username
        ]);
    }
}
