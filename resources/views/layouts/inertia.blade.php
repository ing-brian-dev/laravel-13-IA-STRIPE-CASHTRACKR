<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @viteReactRefresh
    <x-inertia::head />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/inertia.tsx'])
    @endif

    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>

<body>
    <header class="bg-purple-950 py-5 ">
        <div class="max-w-6xl mx-auto flex flex-col items-center lg:flex-row lg:justify-between">
            <div class="w-full max-w-100">
            <a href="">
                <img src="{{ asset('img/logo.svg') }}" alt="Imagen login de usuarios">
            </a>
          </div>
                <nav class="flex flex-col items-center lg:flex-row gap-4 ">
                    @auth
                        <p class="text-white text-xl">Hola: {{ auth()->user()->name }}</p>
                        <x-dropdown-menu />
                    @endauth
        </div>
    </header>    
    
    <div class="mt-5 max-w-5xl mx-auto p-5 lg:p-10">
        <x-inertia::app />
    </div>
</body>