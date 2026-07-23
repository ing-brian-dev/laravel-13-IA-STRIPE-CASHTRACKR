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
    @if (count($budgets) > 0)
        
    <div class="mt-8 flow-root ">
        <div class="overflow-x-auto ring-1 ring-gray-300 rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <table class="relative min-w-full">
                    <thead>
                        <tr>
                            <th scope="col">
                                <span class="sr-only">Presupuestos</span>
                            </th>

                            <th scope="col">
                                <span class="sr-only">Acciones</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 ">
                        @foreach ($budgets as $budget )
                            
                            <tr class="flex items-center justify-between">
                                <td class="pt-10 pb-5 px-10 relative">
                                    <p 
                                        class="{{ $budget -> isGeneral() ? 'bg-purple-950' : 'bg-amber-500' }} 
                                        text-white font-bold absolute top-0 left-0 inline-block px-3 py-1 rounded-br-2xl text-sm w-40"
                                    > 
                                        {{ $budget->isGeneral() ? 'General' : 'Proyecto' }}
                                    </p>
                                    <a 
                                        class="text-2xl font-bold text-gray-500 block"
                                        href="{{ route('budgets.show', $budget) }}"
                                    >
                                        {{ $budget->name }}
                                    </a>
                                    <p class="text-lg text-gray-500">${{ $budget->amount }}</p>
                                </td>
                                <td class="py-6 px-10 flex justify-end gap-3">
                                    <x-budget-dropdown 
                                        :budget="$budget"
                                    />
                                    <x-confirm-delete 
                                        :id="'delete-dialog-'.$budget->id"
                                        :title="'Eliminar presupuesto:'.$budget->name"
                                        message="Esta acción no se puede deshacer"
                                        :action="route('budgets.destroy', $budget -> id)"
                                    />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <p 
            class="text-center text-xl mt-10 "
        >
            No Hay Presupuestos.
            <a 
                href="{{ route('budgets.create') }}" 
                class="text-amber-500"
            >
                Comienza creando uno
            </a>
        </p>
    @endif
@endsection
