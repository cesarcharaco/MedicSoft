<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosOficinasRequest extends FormRequest
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
            'id_oficina' => 'required',
            'solicitante' => 'required',
            'nacionalidad' => 'required',
            'cedula' => 'required|digits_between:6,8|numeric'
        ];
    }

    public function messages()
    {
        return [
            'id_oficina.required' => 'Debe seleccionar una Oficina',
            'solicitante.required' => 'El nombre del Solicitante es Obligatorio',
            'nacionalidad.required' => 'Debe seleccionar la nacionalidad del solicitante',
            'cedula.required' => 'La Cédula es Obligatoria',
            'cedula.digits_between' => 'La Cédula debe contener de 6 a 8 dígitos',
            'cedula.numeric' => 'La Cédula debe contener sólo números'
        ];
    }
}
