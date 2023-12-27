<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PivotUpdateRequest extends FormRequest
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
            'id_area' =>'required|exists:area_investigacions,id',
            'id_linea' =>'required|exists:lineas,id',
            'id_sublinea' =>'required|exists:sub_lineas,id',
        ];
    }
}
