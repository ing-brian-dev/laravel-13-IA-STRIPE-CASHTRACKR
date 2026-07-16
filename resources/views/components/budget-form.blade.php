<div class="flex flex-col gap-2">
    <label class="font-bold text-2xl" for="name">Nombre</label>

    <input 
        id="name" 
        type="text" 
        placeholder="Nombre del Presupuesto. Ej. Boda, Casa, Graduación, Semana"
        class="w-full border border-gray-300 p-3 rounded-lg" 
        name="name" 
    >

    <x-input-error field="name" />
</div>


<div class="flex flex-col gap-2">
    <label class="font-bold text-2xl" for="amount">Cantidad</label>

    <input 
        id="amount" 
        type="number" 
        min="0" 
        step="1" 
        placeholder="Cantidad de Presupuesto"
        class="w-full border border-gray-300 p-3 rounded-lg" 
        name="amount"
    />
    <x-input-error field="amount" />
</div>

<div class="flex flex-col gap-2">
    <div class="flex gap-2 items-center">
        <label class="font-bold text-2xl" for="amount">Tipo de Presupuesto</label>
        <div class="relative inline-block group">
            <button
                class="w-5 h-5 flex items-center justify-center rounded-full bg-gray-900 text-white text-sm font-bold">
                i
            </button>
            <div
                class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-52
                rounded-lg bg-gray-900 text-white px-3 py-2
                opacity-0 invisible
                group-hover:opacity-100 group-hover:visible
                group-focus-within:opacity-100 group-focus-within:visible
                transition-all duration-200 space-y-3">
                <p><span class="font-bold">Presupuesto General</span> te permite almacenar gastos con categorías, ideal para presupuestos semanales o mensuales.</p>
                <p><span class="font-bold">Proyecto</span> te permite almacenar gastos relacionados como una graduación, boda o remodelación.</p>
            </div>
        </div>
    </div>

    
    <select name="type" class="w-full border border-gray-300 p-3 rounded-lg">
        <option value="">Tipo de Presupuesto</option>
        <option value="general">General - Con Categorías</option>
        <option value="goal">Proyecto</option>
    </select>

     <x-input-error field="type" />
</div>