@extends('layouts.app')

@section('title')
    Administra tus Presupuestos
@endsection

@section('actions')
    <div class="sm:flex sm:items-center mt-10">
        <div class="sm:flex-auto">
            <h1 class="font-bold text-4xl">Administra tus Presupuestos</h1>
            <p class="mt-2 text-xl text-gray-500">Administra tus Presupuestos en esta sección</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('budgets.create') }}"
                class="block bg-amber-500 text-white w-full px-5 py-3 rounded-lg  font-bold  text-xl cursor-pointer text-center">Nuevo
                Presupuesto</a>
        </div>
    </div>
@endsection

@section('dashboard-contents')
    {{-- @if (session('success'))
       <x-alert type='success' :message="session('success')" />
    @endif --}}
@endsection
