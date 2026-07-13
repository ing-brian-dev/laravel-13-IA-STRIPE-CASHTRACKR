@extends('layouts.auth')

@section('title')
    Administra tus Presupuestos
@endsection

@section('auth-contents')
    @if (session('success'))
       <x-alert type='error' :message="session('success')" />
    @endif
@endsection
