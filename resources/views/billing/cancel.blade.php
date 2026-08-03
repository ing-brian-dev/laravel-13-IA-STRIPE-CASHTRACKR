@extends('layouts.app')

@section('title')
    Error al Pagar
@endsection

@section('dashboard-contents')
    <div class="rounded-md bg-red-50 p-4 dark:bg-red-500/15 dark:outline dark:outline-red-500/25">
        <div class="flex">
            <div class="shrink-0">
                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 text-red-400">
                    <path
                        d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                        clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Error al Realizar el Pago</h3>
            </div>
        </div>
    </div>

    <p class="mt-2 text-xl text-gray-500">Hubo un error, vuelve a intentarlo. <a class="text-amber-500"
            href={{ route('dashboard') }}>Volver a Presupuestos</a></p>
@endsection
