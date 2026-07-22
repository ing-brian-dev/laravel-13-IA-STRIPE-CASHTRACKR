<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmDelete extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $message,
        public string $action,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.confirm-delete');
    }
}
