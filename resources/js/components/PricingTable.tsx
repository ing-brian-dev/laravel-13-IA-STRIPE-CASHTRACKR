import { router } from '@inertiajs/react';
import { useState } from 'react';
import { route } from 'ziggy-js';

export default function PricingTable() {
    const [loading, setLoading] = useState<string | null>(null);

    const subscribe = (plan: 'monthly' | 'yearly') => {
        setLoading(plan);
        router.post(route('subscription.checkout', { plan }));
    };

    return (

        <>
            <h2 className="font-bold text-4xl">Actualiza tu cuenta a Pro y descubre funciones increíbles.</h2>
            <p className="mt-2 text-xl text-gray-500">Accede a un asistente con IA que te ayuda a gestionar tus gastos: conversa con él y sube imágenes de tus tickets para escanearlos y registrarlos automáticamente.</p>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto mt-10 bg-white">
                {/* Plan Mensual */}
                <div className="rounded-lg border border-gray-300 p-6">
                    <h3 className="text-xl font-bold text-purple-800">Mensual</h3>
                    <p className="mt-2">
                        <span className="text-6xl font-medium">$99</span>
                        <span className="text-gray-400">/mes</span>
                    </p>
                    <ul className="mt-4 space-y-2 text-lg">
                        <li>Asistente AI ilimitado</li>
                        <li>Escaneo de tickets</li>
                        <li>Cancela cuando quieras</li>
                    </ul>
                    <button
                        onClick={() => subscribe('monthly')}
                        disabled={loading !== null}
                        className="bg-purple-950 hover:bg-purple-600 px-5 py-2 my-5 rounded-lg text-white font-bold  text-xl cursor-pointer w-full mt-10"
                    >
                        {loading === 'monthly' ? 'Cargando...' : 'Obtener PRO Mensual'}
                    </button>
                </div>

                {/* Plan Anual */}
                <div className="rounded-lg border-2 border-purple-950 p-6 relative">
                    <span className="absolute -top-3 right-4 bg-purple-950 text-white text-xs px-2 py-1 rounded">
                        2 Meses Gratis
                    </span>
                    <h3 className="text-xl font-bold text-purple-800">Anual</h3>
                    <p className="mt-2">
                        <span className="text-6xl font-medium">$990</span>
                        <span className="text-gray-400">/año</span>
                    </p>
                    <p className="text-sm text-gray-500">Equivale a $82.5/mes</p>
                    <ul className="mt-4 space-y-2 text-lg">
                        <li>Todo lo del plan mensual</li>
                        <li>2 meses gratis</li>
                        <li>Soporte prioritario</li>
                    </ul>
                    <button
                        onClick={() => subscribe('yearly')}
                        disabled={loading !== null}
                        className="bg-purple-950 hover:bg-purple-600 px-5 py-2 my-5 rounded-lg text-white font-bold  text-xl cursor-pointer w-full"
                    >
                        {loading === 'yearly' ? 'Cargando...' : 'Obtener PRO Anual'}
                    </button>
                </div>
            </div>
        </>
    );
}
