import { Head } from '@inertiajs/react';
import { Budget } from "../../types/budget";
import AmountDisplay from '../../components/AmountDisplay';
import ExpenseModal from '../../components/ExpenseModal';
import { useExpenseModalStore } from '../../stores/expense-modal-store';

type BudgetProps = {
  budget: Budget;
}

export default function Show({ budget }: BudgetProps) {

  const { openOrCloseModal } = useExpenseModalStore(state => state)

  return (
    <>
      <Head title={`Presupuesto: ${budget.name}`} />
      <section className="sm:flex sm:items-center mt-10">
        <div className="sm:flex-auto">
          <h1 className="font-bold text-4xl">Presupuesto: {budget.name}</h1>
          <p className="mt-2 text-xl text-gray-500">Maneja tu Presupuesto, añade, quita o edita tus gastos aquí.</p>
        </div>
        <div className="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <a
            href={'/dashboard'}
            className="block bg-amber-500 text-white w-full px-5 py-3 rounded-lg  font-bold  text-xl cursor-pointer text-center">Volver a Presupuestos</a>
        </div>
      </section>

      <main className='grid grid-cols-1 md:grid-cols-2 items-center gap-20 mt-10'>

        <div className='space-y-5'>
          <AmountDisplay
            label='Presupuesto'
            amount={+budget.amount}
          />
          <AmountDisplay
            label='Gastado'
            amount={0}
          />
          <AmountDisplay
            label='Restante'
            amount={0}
          />
        </div>
      </main>

      <section
        className='p-10 lg:px-5 shadow-lg mt-10'
      >
        <div
          className="flex items-center justify-between"
        >
          <h2
            className='text-3xl font-bold'
          >
            Gastos
          </h2>
          <button
            className='bg-purple-950 px-5 py-2 my-5 rounded-lg text-white font-bold text-xl cursor-pointer'
            onClick={openOrCloseModal}
          >
            Nuevo Gasto
          </button>
        </div>
      </section>

      <ExpenseModal />
    </>
  )
}
