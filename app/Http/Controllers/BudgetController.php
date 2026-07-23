<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use Illuminate\Routing\Attributes\Controllers\Authorize;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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
        return Inertia::render('Budgets/Show', [
            'budget' => $budget
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    #[Authorize('update','budget')]
    public function edit(Budget $budget)
    {
        return view('budgets.edit', [
            'budget' => $budget,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    #[Authorize('update','budget')]
    public function update(BudgetRequest $request, Budget $budget)
    {
        $budget->update($request->validated());

        return redirect()->route('dashboard')->with('success', 'Presupuesto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    #[Authorize('delete', 'budget')]
    public function destroy(Budget $budget)
    {
        $budget -> delete();
        return redirect() -> route('dashboard') -> with('success', 'Presupuesto eliminado correctamente');
    }
}
