<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(4);
                
        return view('dashboard', [
            'user'=> $user,
            'posts' => $posts
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
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);
        
        // otra forma de crear registros en un DB
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();
        
        // tercera forma de crear registros en un DB
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        
        // redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
    
    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
