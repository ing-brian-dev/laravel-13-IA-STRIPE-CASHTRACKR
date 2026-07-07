@extends("layouts.auth")

@section('title')
    Inicias Sesion
@endsection

@section('auth-contents')
<form class="mt-14 space-y-5" novalidate>
    <div class="flex flex-col gap-2">
        <label class="font-bold text-2xl" for="email">Email</label>

        <input 
            id="email" 
            type="email" 
            placeholder="Email de Registro"
            class="w-full border border-gray-300 p-3 rounded-lg" 
            name="email" 
            tabindex="1" 
        />
    </div>

    <div class="flex flex-col gap-2">
        <div class="flex  items-center justify-between">
            <label class="font-bold text-2xl">Password</label>
            <a href="#" class="text-indigo-950" tabindex="3">¿Olvidaste tu Contraseña?</a>
        </div>
        <input 
            type="password" 
            placeholder="Password de Registro" 
            class="w-full border border-gray-300 p-3 rounded-lg"
            name="password" 
            tabindex="2" 
        />
    </div>
    <input 
        type="submit" 
        value='Iniciar Sesión'
        class="bg-purple-950 hover:bg-purple-800 w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer" 
    />
</form>
@endsection