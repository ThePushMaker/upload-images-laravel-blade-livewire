@extends('layouts.app')

{{-- @section('titulo', 'Principal') --}}
@section('titulo') 
    Principal
@endsection

@section('contenido')
  @if($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ( $posts as $post )
        <div>
          <a
            href="{{ route('posts.show', [
              'post' => $post,
              'user' => $post->user
            ]) }}"
          >
            <img 
              src="{{ asset('uploads') . '/' . $post->imagen }}"
              alt="Imagen del Post: {{ $post->titulo }}"
            />  
          </a>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-center">No hay publicaciones, sigue a alguien para poder mostrar sus publicaciones</p>
  @endif
  
  {{-- @forelse ( $posts as $post)
    <h1 class="">{{ $post->titulo }}</h1>
  @empty
    <p class="text-center">No hay publicaciones de las personas que sigues</p>
  @endforelse
   --}}
@endsection