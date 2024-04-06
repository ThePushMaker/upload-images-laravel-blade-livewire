@extends('layouts.app')

@section('titulo')
  Registrate en DevStagram
@endsection

@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
      <img 
        class="rounded-lg"
        src="{{ asset('img/registrar.jpg') }}"
        alt="Imagen Registro de Usuarios"
      />
    </div>
    
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form action="/crear-cuenta" method="POST">
        <div class="mb-5">
          <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
            Nombre
          </label>
          <input
            id="name"
            name="name"
            type="text"
            placeholder="Tu Nombre"
            class="border p-3 w-full rounded-lg"
          />
        </div>
        
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Nombre de usuario
          </label>
          <input
            id="username"
            name="username"
            type="text"
            placeholder="Tu Nombre de Usuario"
            class="border p-3 w-full rounded-lg"
          />
        </div>
        
        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
            Email
          </label>
          <input
            id="email"
            name="email"
            type="email"
            placeholder="Tu Correo Electrónico"
            class="border p-3 w-full rounded-lg"
          />
        </div>
        
        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
            Contraseña
          </label>
          <input
            id="password"
            name="password"
            type="password"
            placeholder="Contraseña de Registro"
            class="border p-3 w-full rounded-lg"
          />
        </div>
        
        <div class="mb-5">
          <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
            Repetir Contraseña
          </label>
          <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            placeholder="Repite tu Contraseña"
            class="border p-3 w-full rounded-lg"
          />
        </div>
        
        <input
          type="submit"
          value="Crear Cuenta"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />
      </form>
    </div>
  </div>
@endsection