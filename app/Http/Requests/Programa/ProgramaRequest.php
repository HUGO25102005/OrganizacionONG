<?php

namespace App\Http\Requests\Programa;

use Illuminate\Foundation\Http\FormRequest;

class ProgramaRequest extends FormRequest
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
            'nombre_programa' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'objetivos' => 'nullable|string',
            'publico_objetivo' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date|after_or_equal:fecha_inicio',
            'recursos_necesarios' => 'nullable|string',
            'resultados_esperados' => 'nullable|string',
            'beneficiarios_estimados' => 'nullable|integer|min:1',
            'indicadores_cumplimiento' => 'nullable|string',
            'comentarios_adicionales' => 'nullable|string',
            'monto_presupuesto' => 'nullable|numeric|min:0', // Nueva regla para monto_presupuesto
            'motivo_presupuesto' => 'nullable|string|max:1000', // Nueva regla para motivo_presupuesto
        ];
    }

    public function messages()
    {
        return [
            'nombre_programa.required' => 'El nombre de la clase es obligatorio.',
            'nombre_programa.max' => 'El nombre de la clase no puede superar los 255 caracteres.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_termino.required' => 'La fecha de término es obligatoria.',
            'fecha_termino.after_or_equal' => 'La fecha de término debe ser igual o posterior a la fecha de inicio.',
            'id_presupuesto.integer' => 'El presupuesto debe ser un valor numérico.',
            'beneficiarios_estimados.min' => 'Debe haber al menos 1 beneficiario estimado.',
            // Otros mensajes personalizados según lo necesario
            'monto_presupuesto.numeric' => 'El monto de presupuesto debe ser un valor numérico.',
            'monto_presupuesto.min' => 'El monto de presupuesto debe ser un valor positivo.',
            'motivo_presupuesto.string' => 'El motivo de presupuesto debe ser un texto.',
            'motivo_presupuesto.max' => 'El motivo de presupuesto no debe exceder los 1000 caracteres.',
            // Otros mensajes personalizados para otros campos (si es necesario)
        ];
    }
}
