<el-dropdown class="inline-block">
    <button
        class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring-1 inset-ring-gray-300 hover:bg-gray-50">
        Opciones
        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-400">
            <path
                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" fill-rule="evenodd" />
        </svg>
    </button>

    <el-menu anchor="bottom end" popover
        class="w-56 origin-top-right rounded-md bg-white shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
        <div class="py-1">
            <a href="{{ route('budgets.show', $budget) }}"
                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Ver Presupuesto</a>

            <a href="{{ route('budgets.edit', $budget->id) }}"
                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Editar Presupuesto</a>

            <button 
                type="button"
                command="show-modal"
                commandfor="delete-dialog-{{ $budget->id }}"
                class="block w-full px-4 py-2 text-left text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900"
            >
                Eliminar
            </button>
        </div>
    </el-menu>
</el-dropdown>