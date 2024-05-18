<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
        
        if($request->imagen)
        {
            $imagen = $request->file('imagen');
        
            // generear un nombre unico para cada imagen
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            
            // la imagen se almacena en el servidor y se redimensiona
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
    
            // creamos el path donde se guardará la imagen y se guarda allí
            $imagenPath = public_path('profiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        
        // guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? '';
        $usuario->save();
        
        // redireccionar con el usuario modificado
        return redirect()->route('posts.index', $usuario->username);
}
