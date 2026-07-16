@extends('layouts.app')

@section('title')
  Crear Presupuesto
@endsection

@section('actions')
    <div class="sm:flex sm:items-center mt-10">
        <div class="sm:flex-auto">
            <h1 class="font-bold text-4xl">Crear Presupuesto</h1>
            <p class="mt-2 text-xl text-gray-500">Crear un Presupuesto es sencillo: añade un nombre y cantidad.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('dashboard') }}"
                class="block bg-amber-500 text-white w-full px-5 py-3 rounded-lg  font-bold  text-xl cursor-pointer text-center">Volver a Presupuestos</a>
        </div>
    </div>
@endsection

@section('dashboard-contents')
   <form  
        method="POST"
        action="{{ route('budgets.store') }}"
        class="mt-14 space-y-3 max-w-2xl mx-auto" 
        novalidate
    >
    @csrf
    <x-budget-form />
    <input type="submit" value='Crear Presupuesto'
            class="bg-purple-950 hover:bg-purple-800 w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer" />
  </form>
@endsection