<?php

namespace App\View\Components;

use App\Models\Budget;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BudgetForm extends Component
{

    public ?Budget $budget;

    public function __construct(Budget $budget)
    {
        $this -> budget = $budget;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.budget-form');
    }
}
