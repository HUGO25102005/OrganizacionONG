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
            // Reglas para el programa educativo
            'id_administrador' => 'nullable|exists:administradores,id', // Debe ser una clave foránea válida
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date|after_or_equal:today', // Debe ser una fecha futura
            'fecha_fin' => 'required|date|after:fecha_inicio', // Debe ser posterior a fecha_inicio
            'objetivo' => 'required|string',
            'comentarios' => 'nullable|string', // Comentarios opcionales

            // Reglas para el producto solicitado
            'nombre' => 'required|string|max:255', // Nombre del producto
            'descript' => 'required|string', // Descripción del producto
            'cantarticulos' => 'required|integer|min:1', // Cantidad de artículos, debe ser un número entero mayor a 0
        ];
    }

    public function messages()
    {
        return [
            // Mensajes para el programa educativo
            'id_administrador.exists' => 'El administrador seleccionado no es válido.',
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no debe exceder los 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_inicio.after_or_equal' => 'La fecha de inicio debe ser hoy o una fecha futura.',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after' => 'La fecha de fin debe ser posterior a la fecha de inicio.',
            'objetivo.required' => 'El objetivo es obligatorio.',
            'comentarios.string' => 'Los comentarios deben ser texto.',

            // Mensajes para el producto solicitado
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.max' => 'El nombre del producto no debe exceder los 255 caracteres.',
            'descript.required' => 'La descripción del producto es obligatoria.',
            'cantarticulos.required' => 'La cantidad de artículos es obligatoria.',
            'cantarticulos.integer' => 'La cantidad de artículos debe ser un número entero.',
            'cantarticulos.min' => 'La cantidad de artículos debe ser al menos 1.',
        ];
    }
}
