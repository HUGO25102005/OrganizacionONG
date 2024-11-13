<?php

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficiarioRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date|before:today',
            'email' => 'required|email|unique:users,email',
            'dias_disponibles' => 'nullable|string',
            'genero' => 'required|string|in:M,F',
            'telefono' => 'required|string|min:10|max:15',
            'direccion' => 'required|string|max:255',
            'pais' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
            'municipio' => 'required|string|max:100',
            'cp' => 'required|string|min:5|max:10',
            'preferencia_colaboracion' => 'nullable|string',
            'experiencia_previa' => 'nullable|string',
            'horario_preferible' => 'nullable|string',
            'habilidades_conocimientos' => 'nullable|string',
            'area_interes' => 'nullable|string',
            'comentarios' => 'nullable|string',
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_termino' => 'required|date|after:fecha_inicio',
            'hrs_dedicadas_semana' => 'required|integer|min:1|max:40',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es obligatorio.',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_materno.required' => 'El apellido materno es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'genero.in' => 'El género debe ser M o F.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'direccion.required' => 'La dirección es obligatoria.',
            'cp.required' => 'El código postal es obligatorio.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_termino.required' => 'La fecha de término es obligatoria.',
            'fecha_termino.after' => 'La fecha de término debe ser posterior a la fecha de inicio.',
            'hrs_dedicadas_semana.required' => 'Las horas dedicadas por semana son obligatorias.',
            'hrs_dedicadas_semana.min' => 'Las horas dedicadas deben ser al menos 1 hora por semana.',
            'hrs_dedicadas_semana.max' => 'Las horas dedicadas no deben superar las 40 horas por semana.',
        ];
    }
}
