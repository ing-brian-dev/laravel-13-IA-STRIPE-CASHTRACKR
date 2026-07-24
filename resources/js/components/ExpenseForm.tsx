import { useForm } from "@inertiajs/react";
import { useExpenseModalStore } from "../stores/expense-modal-store";
import { route } from 'ziggy-js';
import InputError from "./InputError";

export default function ExpenseForm() {

    const budget = useExpenseModalStore(state => state.budget);
    const categories = useExpenseModalStore(state => state.categories);
    const openOrCloseModal = useExpenseModalStore(state => state.openOrCloseModal);

    const { data, setData, post, errors, reset, processing } = useForm({
        name: '',
        amount: '',
        category: ''
    });

    if (!budget) return null;

    const submit = (e: React.SubmitEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(route('expenses.store', budget.id), {
            onSuccess: () => {
                reset();
                openOrCloseModal();
            }
        });
    }

    return (
        <div className='p-10 flex justify-center'>
            <form
                onSubmit={submit}
                className='flex flex-col space-y-3 w-full'
            >
                <div className='space-y-3'>
                    <label htmlFor="name" className='block text-xl font-bold'>Nombre Gasto</label>
                    <input
                        id='name'
                        type="text"
                        placeholder="Nombre del gasto"
                        className="w-full border border-gray-300 p-3 rounded-lg"
                        value={data.name}
                        onChange={e => setData('name', e.target.value)}
                    />
                    {errors.name && <InputError>{errors.name}</InputError>}
                </div>

                <div className='space-y-3'>
                    <label htmlFor="amount" className='block text-xl font-bold'>Cantidad Gasto</label>
                    <input
                        id='amount'
                        type="number"
                        placeholder="Cantidad"
                        className="w-full border border-gray-300 p-3 rounded-lg"
                        value={data.amount}
                        onChange={e => setData('amount', e.target.value)}
                    />
                    {errors.amount && <InputError>{errors.amount}</InputError>}
                </div>
                {budget.type === 'general' && (
                    <div className='space-y-3'>
                        <label htmlFor="category" className='block text-xl font-bold'>Categoría Gasto</label>
                        <select
                            name="category"
                            id="category"
                            className='w-full border border-gray-300 p-3 rounded-lg'
                            value={data.category}
                            onChange={e => setData('category', e.target.value)}
                        >
                            <option disabled value="">Selecciona Categoría</option>
                            {categories.map(category => (
                                <option
                                    key={category.value}
                                    value={category.value}
                                >
                                    {category.label}
                                </option>
                            ))}
                        </select>
                        {errors.category && <InputError>{errors.category}</InputError>}
                    </div>
                )}
                <button
                    type="submit"
                    disabled={processing}
                    className={`
                            ${processing ? ' opacity-60 cursor-not-allowed ' : ' hover:bg-purple-800 cursor-pointer '}
                            bg-purple-950 mt-5 w-full p-3 rounded-lg text-white font-bold text-xl`}
                >
                    {processing ? 'Guardando...' : 'Agregar Gasto'}
                </button>
            </form>
        </div>
    );
};