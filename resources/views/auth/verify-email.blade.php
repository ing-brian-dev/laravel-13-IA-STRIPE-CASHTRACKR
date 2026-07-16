@extends('layouts.auth')

@section('title')
    Confirma tu cuenta
@endsection

@section('auth-contents')
    <p
        class="mt-5 text-lg"
    >
        Tu cuenta fue creada con éxito, Ahora debes de confirmarla, revisa tu email.
    </p>
    @if (session('success'))
        <x-alert type='success' :message="session('success')" />
    @endif
    <form 
        action="{{ route('verification.send') }}"
        method="POST"
    >
        @csrf
        <input 
            type="submit"
            class="bg-amber-500 w-full text-center mt-5 px-5 py-2 uppercase font-bold cursor-pointer"
            value="Reenviar correo de verificacion"
        >
    </form>
@endsection
