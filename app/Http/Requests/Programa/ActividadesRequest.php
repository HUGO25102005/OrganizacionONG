<?php

namespace App\Http\Requests\Programa;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActividadesRequest extends FormRequest
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
            'id_programa' => 'required|integer|exists:programas_educativos,id',
            'fecha_actividad' => 'required|date|after_or_equal:today',
            'nombre' => 'required|string|max:70',
            'descripcion_actividad' => 'required|string|max:500',
            'resultados_actividad' => 'nullable|string|max:500',
            'comentarios_adicionales' => 'nullable|string|max:500',
        ];
    }

    /**
     * Mensajes personalizados para las reglas de validación.
     */
    public function messages()
    {
        return [
            'id_programa.required' => 'El ID del programa es obligatorio.',
            'id_programa.integer' => 'El ID del programa debe ser un número entero.',
            'id_programa.exists' => 'El ID del programa no es válido.',

            'fecha_actividad.required' => 'La fecha de la actividad es obligatoria.',
            'fecha_actividad.date' => 'La fecha de la actividad debe ser una fecha válida.',
            'fecha_actividad.after_or_equal' => 'La fecha de la actividad no puede ser anterior a hoy.',

            'nombre.required' => 'El nombre de la actividad es obligatorio.',
            'nombre.string' => 'El nombre de la actividad debe ser una cadena de texto.',
            'nombre.max' => 'El nombre de la actividad no puede tener más de 70 caracteres.',

            'descripcion_actividad.required' => 'La descripción de la actividad es obligatoria.',
            'descripcion_actividad.string' => 'La descripción de la actividad debe ser un texto.',
            'descripcion_actividad.max' => 'La descripción de la actividad no puede exceder los 500 caracteres.',

            'resultados_actividad.string' => 'Los resultados de la actividad deben ser un texto.',
            'resultados_actividad.max' => 'Los resultados de la actividad no pueden exceder los 500 caracteres.',
            
            'comentarios_adicionales.string' => 'Los comentarios adicionales deben ser un texto.',
            'comentarios_adicionales.max' => 'Los comentarios adicionales no pueden exceder los 500 caracteres.',
        ];
    }

    /**
     * Manejo de errores de validación.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Errores de validación.',
            'errors' => $validator->errors(),
        ], 422));
    }
}
