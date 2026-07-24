import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/react'
import { Expense } from '../types/expense'
import { useExpenseModalStore } from '../stores/expense-modal-store'

type ExpenseDropdownProps = {
    expense: Expense
}

export default function ExpenseDropdown({ expense }: ExpenseDropdownProps) {
    const openEditModal = useExpenseModalStore(state => state.openEditModal);
    return (
        <Menu as="div" className="relative inline-block ">
            <MenuButton className="cursor-pointer inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring-1 inset-ring-gray-300">
                Opciones
            </MenuButton>

            <MenuItems
                transition
                className="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg outline-1 outline-black/5 transition data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in"
            >
                <div className="py-1">
                    <MenuItem>
                        <button
                            type="button"
                            onClick={() => openEditModal(expense)}
                            className="cursor-pointer bg-amber-500 font-bold text-white hover:bg-amber-400 group flex w-full items-center px-4 py-2 text-left text-sm data-focus:bg-gray-100 data-focus:text-gray-900"
                        >
                            Editar
                        </button>
                    </MenuItem>

                    <MenuItem>
                        <button
                            onClick={() => { }}
                            className="cursor-pointer bg-red-600 font-bold text-white hover:bg-red-400 group w-full flex items-center px-4 py-2 text-sm data-focus:bg-gray-100 data-focus:text-gray-900 data-focus:outline-hidden"
                        >

                            Eliminar
                        </button>
                    </MenuItem>
                </div>
            </MenuItems>
        </Menu>
    )
}