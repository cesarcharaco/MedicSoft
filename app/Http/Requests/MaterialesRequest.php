<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_material' => 'required',
            'modelo_marca' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tipo_material.required' => 'El Tipo de Material es Obligatorio',
            'modelo_marca.required' => 'El Modelo o Marca del Material es Obligatorio(a)'
        ];
    }
}
