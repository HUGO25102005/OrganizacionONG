<?php

namespace App\Http\Requests\Usuarios;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class AdminRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'pais' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'string', 'max:100'],
            'municipio' => ['required', 'string', 'max:100'],
            'cp' => ['required', 'string', 'max:100'],
            'direccion' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'in:M,F,O'],
            'telefono' => ['required', 'string', 'max:20'],
            'hora_inicio' => ['required', 'date_format:H:i'],
            'hora_fin' => ['required', 'date_format:H:i'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',

            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_paterno.string' => 'El apellido paterno debe ser una cadena de texto.',
            'apellido_paterno.max' => 'El apellido paterno no puede exceder los 255 caracteres.',

            'apellido_materno.required' => 'El apellido materno es obligatorio.',
            'apellido_materno.string' => 'El apellido materno debe ser una cadena de texto.',
            'apellido_materno.max' => 'El apellido materno no puede exceder los 255 caracteres.',

            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.lowercase' => 'El correo electrónico debe estar en minúsculas.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',

            'pais.required' => 'El país es obligatorio.',
            'pais.string' => 'El país debe ser una cadena de texto.',
            'pais.max' => 'El país no puede exceder los 100 caracteres.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.string' => 'El estado debe ser una cadena de texto.',
            'estado.max' => 'El estado no puede exceder los 100 caracteres.',

            'municipio.required' => 'El municipio es obligatorio.',
            'municipio.string' => 'El municipio debe ser una cadena de texto.',
            'municipio.max' => 'El municipio no puede exceder los 100 caracteres.',

            'cp.required' => 'El código postal es obligatorio.',
            'cp.string' => 'El código postal debe ser una cadena de texto.',
            'cp.max' => 'El código postal no puede exceder los 100 caracteres.',

            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser una cadena de texto.',
            'direccion.max' => 'La dirección no puede exceder los 255 caracteres.',

            'genero.required' => 'El género es obligatorio.',
            'genero.in' => 'El género debe ser M (Masculino), F (Femenino) o O (Otro).',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser una cadena de texto.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'hora_inicio.required' => 'La hora de inicio es obligatoria.',
            'hora_inicio.date_format' => 'La hora de inicio debe tener el formato HH:MM.',

            'hora_fin.required' => 'La hora de fin es obligatoria.',
            'hora_fin.date_format' => 'La hora de fin debe tener el formato HH:MM.',
        ];
    }
}
