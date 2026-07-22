<?php

namespace App\Policies;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BudgetPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Budget $budget): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Budget $budget): Response
    {
        return $user->id === $budget->user_id ? Response::allow() : Response::deny('No tienes permiso para editar este presupuesto');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Budget $budget): Response
    {
        return $user->id === $budget->user_id ? Response::allow() : Response::deny('No tienes permiso para eliminar este presupuesto');
    }
}
