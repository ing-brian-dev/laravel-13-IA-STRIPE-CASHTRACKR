<?php

namespace App\Http\Requests;

use App\BudgetType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Override;

class BudgetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required','decimal:0,2','min:0.01'],
            'type' => ['required', new Enum(BudgetType::class)]
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'name.required' => 'El nombre del presupuesto es requerido',
            'amount.required' => 'La cantidad es requerida',
            'amount.decimal' => 'La cantidad debe de ser un numero valido',
            'amount.min' => 'La cantidad debe ser mayor a 0',
            'type.required' => 'El tipo de presupuesto es requerido',
            'type.in' => 'El tipo de presupuesto no es válido'
        ];
    }
}
