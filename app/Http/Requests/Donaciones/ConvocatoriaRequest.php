<?php

namespace App\Http\Requests\Donaciones;

use Illuminate\Foundation\Http\FormRequest;

class ConvocatoriaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'id_administrador' => 'nullable|exists:administradores_id', // Debe ser una clave foránea válida
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date|after_or_equal:today', // Debe ser una fecha futura
            'fecha_fin' => 'required|date|after:fecha_inicio', // Debe ser posterior a fecha_inicio
            'objetivo' => 'required|string',
            'comentarios' => 'nullable|string', // Cambia a 'required' si es necesario
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'objetivo.required' => 'El objetivo es obligatorio.',
        ];
    }
}
