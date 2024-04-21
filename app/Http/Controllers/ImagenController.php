<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');
        
        // generear un nombre unico para cada imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        
        // la imagen se almacena en el servidor y se redimensiona
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        // creamos el path donde se guardará la imagen y se guarda allí
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
          
        return response()->json([
            'imagen' => $nombreImagen
        ]);
    }
}
