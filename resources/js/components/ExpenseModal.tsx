import { Dialog, DialogBackdrop, DialogPanel, DialogTitle } from '@headlessui/react';
import { useExpenseModalStore } from '../stores/expense-modal-store';
import ExpenseForm from './ExpenseForm';

export default function ExpenseModal() {

  const { open, openOrCloseModal } = useExpenseModalStore(state => state);

  return (
    <div>

      <Dialog open={open} onClose={openOrCloseModal} className="relative z-10">
        <DialogBackdrop
          transition
          className="fixed inset-0 bg-black/70 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"
        />

        <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div className="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <DialogPanel
              transition
              className="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-2xl sm:p-6 data-closed:sm:translate-y-0 data-closed:sm:scale-95"
            >
              <DialogTitle as="h3" className="text-4xl font-black mt-10 text-center">
                Nuevo Gasto
              </DialogTitle>

              <ExpenseForm />

            </DialogPanel>
          </div>
        </div>
      </Dialog>
    </div>
  )
}