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

            'nivel_educativo' => 'required|in:1,2,3,4', // Validación específica
            'ocupacion' => 'required|string|max:100',
            'num_dependientes' => 'required|integer|min:0',
            'ingresos_mensuales' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
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
            'nivel_educativo.required' => 'El nivel educativo es obligatorio.',
            'nivel_educativo.in' => 'El nivel educativo seleccionado no es válido.',
            'ocupacion.required' => 'La ocupación es obligatoria.',
            'num_dependientes.required' => 'El número de dependientes es obligatorio.',
            'num_dependientes.integer' => 'El número de dependientes debe ser un número entero.',
            'num_dependientes.min' => 'El número de dependientes no puede ser negativo.',
            'ingresos_mensuales.numeric' => 'Los ingresos mensuales deben ser un valor numérico.',
            'ingresos_mensuales.min' => 'Los ingresos mensuales no pueden ser negativos.',
        ];
    }
}
