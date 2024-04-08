<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        // validación
        $validated = $request->validate([
            'name' => ['required', 'max:30'],
        ]);
    }
}
