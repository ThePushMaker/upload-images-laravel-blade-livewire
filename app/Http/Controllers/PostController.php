<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    public function index(User $user)
    {
        return view('dashboard', [
            'user'=> $user
        ]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        // validación
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        
        // forma de crear registros en un DB
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        
        // otra forma de crear registros en un DB
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();
        
        // redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
