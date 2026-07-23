<?php

namespace App\Http\Requests;

use App\ExpenseCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $budget = $this->route('budget');

        return $budget && $this->user()->can('update', $budget);
    }

    public function rules(): array
    {
        $budget = $this->route('budget');

        return [
            'name' => ['required', 'string', 'max:100'],
            'amount' => ['required', 'decimal:0,2', 'min:0.01'],
            'category' => Rule::when(
                $budget->isGeneral(),
                ['required', new Enum(ExpenseCategory::class)],
                ['nullable']
            ),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del gasto es obligatorio',
            'amount.required' => 'La cantidad es obligatoria',
            'amount.decimal' => 'La cantidad debe ser un número válido con hasta 2 decimales',
            'amount.min' => 'La cantidad debe ser mayor a 0',
            'category.required' => 'La categoría es obligatoria',
            'category.enum' => 'La categoría no existe',
        ];
    }
}
