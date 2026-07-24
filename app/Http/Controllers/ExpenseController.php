<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Budget;
use App\Models\Expense;
use Illuminate\Http\Request;

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
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
