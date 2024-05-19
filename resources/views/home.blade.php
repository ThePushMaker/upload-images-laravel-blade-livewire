@extends('layouts.app')

{{-- @section('titulo', 'Principal') --}}
@section('titulo') 
    Principal
@endsection

@section('contenido')
  <x-listar-post />
@endsection