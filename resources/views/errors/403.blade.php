@extends('layouts.app')

@section('title', 'Acceso denegado')

@section('contents')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <h1 class="text-6xl font-bold">403</h1>
        <p class="mt-4 text-xl text-gray-600">
            {{ $exception->getMessage() ?: 'No tienes permiso para acceder a este recurso.' }}
        </p>
        <a href="{{ route('dashboard') }}" 
           class="mt-6 inline-block px-6 py-3 bg-purple-950 text-white rounded-lg">
            Regresar
        </a>
    </div>
@endsection