<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Budget;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request, Budget $budget)
    {
        $budget->expenses()->create($request->validated());

        return redirect()->route('budgets.show', $budget)->with('success', 'Gasto registrado correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Budget $budget, Expense $expense)
    {
        $expense->update($request->validated());

        return redirect()->route('budgets.show', $budget)->with('success', 'Gasto Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget, Expense $expense)
    {
        $expense->delete();

        return redirect()->route('budgets.show', $budget)->with('success', 'Gasto Eliminado correctamente');
    }
}
