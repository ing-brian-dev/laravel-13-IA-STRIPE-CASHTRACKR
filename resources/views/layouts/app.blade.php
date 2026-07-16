@extends('layouts.base')

@section('contents')
    <div 
        class="max-w-5xl mx-auto p-5 lg:p-10"
    >
        @yield('actions')
    </div>

    <main
        class="mt-5 max-w-5xl mx-auto p-5 lg:p-10"
    >
        @yield('dashboard-contents')
    </main>
@endsection
