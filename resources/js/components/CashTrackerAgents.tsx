import { useChat } from '@ai-sdk/react';
import { DefaultChatTransport } from 'ai';
import { useState } from 'react';

type CashTrackrAgentProps = {
    budgetId: number
}


export default function CashTrackrAgent({budgetId}: CashTrackrAgentProps) {

    const [input, setInput] = useState('');
    const { sendMessage, messages } = useChat({
        transport: new DefaultChatTransport({
            api: `/dashboard/budgets/${budgetId}/chat`
        })
    });

    return (
        <section className='p-10 lg:px-5 shadow-lg mt-10'>
            <h2 className="text-3xl font-bold">Pregunta sobre tu Presupuesto, añade gastos y más.</h2>
            <div className="space-y-3 mb-4 mt-8"></div>
            
            <form
                onSubmit={(e) => {
                    e.preventDefault();
                    if(input.trim()){
                        sendMessage({
                            text: input
                        });
                        setInput('');
                    }
                } }
                className="flex flex-col gap-2"
            >
                <textarea
                    value={input}
                    onChange={(e) => setInput(e.target.value)}
                    placeholder="Consulta dudas sobre tu Presupuesto o Agrega Gastos"
                    className="w-full border border-gray-300 p-3 rounded-lg text-xl"
                />
                <div className="flex gap-2">
                    <button
                        type="submit"
                        className="flex-1 mt-5 bg-purple-950 hover:bg-purple-800 p-3 rounded-lg text-white font-bold text-xl cursor-pointer disabled:opacity-20"
                    >
                        Consultar
                    </button>
                    <button
                        type="button"
                        onClick={() => {} }
                        className="mt-5 bg-amber-500 hover:bg-amber-500 p-3 rounded-lg text-white font-bold text-xl cursor-pointer disabled:opacity-20"
                    >
                        Subir Ticket
                    </button>
                </div>
                <input
                    type="file"
                    accept="image/*"
                    className="hidden"
                />
            </form>
        </section>
    );
}