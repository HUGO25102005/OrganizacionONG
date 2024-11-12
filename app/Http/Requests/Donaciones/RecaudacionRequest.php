<?php

namespace App\Http\Requests\Donaciones;

use Illuminate\Foundation\Http\FormRequest;

class RecaudacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cantidad' => 'required|integer|min:1', // Cantidad de artículos, debe ser un número entero
            'comentarios' => 'required|string|max:500', // Comentarios con un límite de caracteres
        ];
    }

    public function messages()
    {
        return [
            
            'cantidad.required' => 'La cantidad de artículos es obligatoria.',
            'cantidad.integer' => 'La cantidad de artículos debe ser un número entero.',
            'cantidad.min' => 'La cantidad de artículos debe ser al menos 1.',
            
            'comentarios.required' => 'Los comentarios son obligatorios.',
            'comentarios.string' => 'Los comentarios deben ser texto.',
            'comentarios.max' => 'Los comentarios no pueden exceder los 500 caracteres.',
        ];
    }
}
