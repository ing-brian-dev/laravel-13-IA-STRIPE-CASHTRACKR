@if (auth()->user()->isOnYearlyPlan())
    <p class="border-2 text-lg border-amber-500 rounded-lg text-amber-500 py-2 px-5 font-black">PRO Anual</p>
@elseif (auth()->user()->isOnMonthlyPlan())
    <p class="border-2 text-lg border-amber-500 rounded-lg text-amber-500 py-2 px-5 font-black">PRO Mensual</p>
@else
    <a class="border-2 text-lg border-amber-500 rounded-lg text-amber-500 py-2 px-5 font-black"
        href="{{ route('plans') }}">Suscribirse a PRO</a>
@endif
