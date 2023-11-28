<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dni' => ['required', 'integer','digits:8'],
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer','digits:9'],
            'email' => ['required', 'string', 'email'],
            'id_tipo' => 'required|exists:tipos,id',
            'user_id' => 'nullable|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'dni.required' => 'El campo DNI es obligatorio',
            'dni.digits' => 'El DNI debe de tener 8 digitos',
            'dni.unique' => 'El DNI ya esta registrado',
            'dni.integer' => 'El campo DNI debe ser un numero entero',
            'name.required' => 'El campo Nombre es obligatorio',
            'first_name.required' => 'El campo Apellido Paterno es obligatorio',
            'last_name.required' => 'El campo Apellido Materno es obligatorio',
            'id_tipo.required' => 'El campo Tipo es obligatorio',
            'id_tipo.exists' => 'El Tipo Persona seleccionado no es valido',
            'user_id.required' => 'El campo id_user es obligatorio',
            'user_id.exists' => 'El id_user seleccionado no es valido',
            'phone.required' => 'El campo Telefono es obligatorio',
            'phone.digits' => 'El Telefono debe de tener 9 digitos',
            'email.required' => 'El campo Email es obligatorio',
        ];
    }
}
