import { Dialog, DialogPanel, DialogTitle, DialogBackdrop } from '@headlessui/react';
import {router} from '@inertiajs/react';
import { useDeleteExpenseStore } from '../stores/expense-delete-store';
import { useExpenseModalStore } from '../stores/expense-modal-store';
import { route } from 'ziggy-js';


export default function DeleteExpenseModal() {
    const budget = useExpenseModalStore(state => state.budget);
    const open = useDeleteExpenseStore(state => state.open);
    const expense = useDeleteExpenseStore(state => state.expense);
    const closeModal = useDeleteExpenseStore(state => state.closeModal);

    if (!budget || !expense) return null;

    const handleDelete = () => {
        router.delete(
            route('expenses.destroy', { budget: budget.id, expense: expense.id }), {
            onSuccess: () => {
                closeModal();
            },
            preserveScroll: true
        }
        )
    }

    return (
        <Dialog open={open} onClose={closeModal} className="relative z-10">
            <DialogBackdrop
                transition
                className="fixed inset-0 bg-black/70 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in dark:bg-gray-900/50"
            />

            <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div className="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <DialogPanel
                        transition
                        className="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg sm:p-6 data-closed:sm:translate-y-0 data-closed:sm:scale-95 dark:bg-gray-800 dark:outline dark:-outline-offset-1 dark:outline-white/10"
                    >

                        <div className="sm:flex sm:items-start">
                            <div className="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <DialogTitle as="h3" className="text-2xl font-semibold text-gray-900 dark:text-white">
                                    Eliminar Gasto: {expense?.name}
                                </DialogTitle>
                                <div className="mt-2">
                                    <p className="text-xl text-gray-500 dark:text-gray-400">
                                        ¿Deseas eliminar este gasto? Un gasto eliminado. no se puede recuperar
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div className="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <button
                                type="button"
                                onClick={handleDelete}
                                className="cursor-pointer inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto dark:bg-red-500 dark:shadow-none dark:hover:bg-red-400"
                            >
                                Eliminar
                            </button>
                            <button
                                type="button"
                                onClick={closeModal}
                                className="cursor-pointer mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring-1 inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-white/10 dark:text-white dark:shadow-none dark:inset-ring-white/5 dark:hover:bg-white/20"
                            >
                                Cancelar
                            </button>
                        </div>
                    </DialogPanel>
                </div>
            </div>
        </Dialog>
    )
}