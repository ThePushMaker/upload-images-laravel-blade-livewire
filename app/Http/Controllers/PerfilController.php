<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerfilController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    
    public function store(Request $request, User $user)
    {
        // modficar el request
        $request->request->add([
            'username' => Str::slug($request->username)
        ]);
        
        $validated = $request->validate([
            'username' => ['required', 'unique:users,username,'.auth()->user()->id,'min:3','max:20', 'not_in:twitter,editar-perfil'],
        ]);
    }
}
