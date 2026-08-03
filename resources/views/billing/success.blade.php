@extends('layouts.app')

@section('title')
    Pago Exitoso
@endsection

@section('dashboard-contents')
    <div class="rounded-md bg-green-50 p-4 dark:bg-green-500/10 dark:outline dark:outline-green-500/20">
        <div class="flex">
            <div class="shrink-0">
                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 text-green-400">
                    <path
                        d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                        clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800 dark:text-green-300">Pago Exitoso</p>
            </div>
        </div>
    </div>

    <h1 class="font-bold text-4xl mt-5">Ahora eres PRO</h1>
    <p class="mt-2 text-xl text-gray-500">Tu cuenta ya es PRO, explora todos los beneficios en tus <a class="text-amber-500"
            href={{ route('dashboard') }}>Presupuestos</a></p>
@endsection
