<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // obtener a quien sigue el usuario
        dd(auth()->user()->following->pluck('id')->toArray());
        
        return view('home');
    }
}
