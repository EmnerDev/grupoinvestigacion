<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoUpdateRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'pre_group_inv'=>'required|string|max:255',
            'objective'=>'required|string|max:255',
            'obj_desa_soste_l_i'=>'required|string|max:255',
            'services'=>'required|string|max:255',
            'laboratory'=>'required|string|max:255',
            'id_area'=>'required|exists:area_investigacions,id',
            'id_linea'=>'required|exists:lineas,id',
            'id_sublinea'=>'required|exists:sub_lineas,id',
            'id_facultad'=>'required|exists:facultads,id',
            'id_escuela'=>'required|exists:escuelas,id',
            'integrante.id_persona' => 'required|exists:integrantes,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo Nombre del grupo es obligatorio',
            'pre_group_inv.required' => 'El campo Presentacion del grupo es obligatorio',
            'objective.required' => 'El campo Objetivos es obligatorio',
            'obj_desa_soste_l_i.required' => 'El campo Objetivo de desarrollo sostenible es obligatorio',
            'services.required' => 'El campo Servicios es obligatorio',
            'laboratory.required' => 'El campo Laboratorio es obligatorio',
            'id_area.required' => 'El campo Area de Investigacion es obligatorio',
            'id_area.exists' => 'El tipo de area de investigacion seleccionado no es valido',
            'id_linea.required' => 'El campo Linea es obligatorio',
            'id_linea.exists' => 'El Tipo de linea seleccionado no es valido',
            'id_sublinea.required' => 'El campo Sublinea es obligatorio',
            'id_sublinea.exists' => 'El tipo de sublinea seleccionado no es valido',
            'id_facultad.required' => 'El campo Facultad es obligatorio',
            'id_facultad.exists' => 'El tipo de facultad seleccionado no es valido',
            'id_escuela.required' => 'El campo Escuela es obligatorio',
            'id_escuela.exists' => 'El tipo de escuela seleccionado no es valido',
            'integrante.id_persona' => 'El campo Persona es obligatorio',
            'integrante.id_persona' => 'El tipo de Persona seleccionado no es valido'
        ];
    }
}
