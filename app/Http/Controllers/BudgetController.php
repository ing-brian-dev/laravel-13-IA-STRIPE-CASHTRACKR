<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

// #[Middleware('auth', except: ['index'])]
// #[Middleware('auth', only: ['index'])]
#[Middleware('auth')]
#[Middleware('verified')]
class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgets = Auth::user()->budgets()->get();

        return view('dashboard', [
            'budgets' => $budgets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budgets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BudgetRequest $request)
    {
        Auth::user()->budgets()->create($request->validated());

        return redirect()->route('dashboard') -> with('success','Presupuesto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        return view('budgets.edit', [
            'budget' => $budget,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BudgetRequest $request, Budget $budget)
    {
        $budget->update($request->validated());

        return redirect()->route('dashboard')->with('success', 'Presupuesto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
