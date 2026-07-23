import { useExpenseModalStore } from "../stores/expense-modal-store";



export default function ExpenseForm() {

    const budget = useExpenseModalStore(state => state.budget);
    const categories = useExpenseModalStore(state => state.categories);

    if (!budget) return null;

    return (
        <div className='p-10 flex justify-center'>
            <form className='flex flex-col space-y-3 w-full'>
                <div className='space-y-3'>
                    <label htmlFor="name" className='block text-xl font-bold'>Nombre Gasto</label>
                    <input
                        id='name'
                        type="text"
                        placeholder="Nombre del gasto"
                        className="w-full border border-gray-300 p-3 rounded-lg"
                    />
                </div>

                <div className='space-y-3'>
                    <label htmlFor="amount" className='block text-xl font-bold'>Cantidad Gasto</label>
                    <input
                        id='amount'
                        type="number"
                        placeholder="Cantidad"
                        className="w-full border border-gray-300 p-3 rounded-lg"
                    />
                </div>
                {budget.type === 'general' && (
                    <div className='space-y-3'>
                        <label htmlFor="category" className='block text-xl font-bold'>Categoría Gasto</label>
                        <select
                            name="category"
                            id="category"
                            className='w-full border border-gray-300 p-3 rounded-lg'
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
                    </div>
                )}
                <button type="submit" className="mt-5 bg-purple-950 hover:bg-purple-800 w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer">
                    Agregar Gasto
                </button>
            </form>
        </div>
    );
};