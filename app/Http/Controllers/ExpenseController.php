<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Budget;
use App\Models\Expense;
use Illuminate\Routing\Attributes\Controllers\Authorize;
use Illuminate\Support\Facades\Gate;

class ExpenseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request, Budget $budget)
    {
        Gate::authorize('create', [Expense::class, $budget]);
        $budget->expenses()->create($request->validated());

        return redirect()->route('budgets.show', $budget)->with('success', 'Gasto registrado correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    #[Authorize('update', 'expense')]
    public function update(ExpenseRequest $request, Budget $budget, Expense $expense)
    {
        $expense->update($request->validated());

        return redirect()->route('budgets.show', $budget)->with('success', 'Gasto Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    #[Authorize('delete', 'expense')]
    public function destroy(Budget $budget, Expense $expense)
    {
        $expense->delete();

        return redirect()->route('budgets.show', $budget)->with('success', 'Gasto Eliminado correctamente');
    }
}
