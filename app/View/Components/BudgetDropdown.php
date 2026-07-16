<?php

namespace App\View\Components;

use App\Models\Budget;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BudgetDropdown extends Component
{
    public ?Budget $budget;

    public function __construct(Budget $budget)
    {
        $this -> budget = $budget;
    }

    public function render(): View|Closure|string
    {
        return view('components.budget-dropdown');
    }
}
