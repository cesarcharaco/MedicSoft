<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicosRequest extends FormRequest
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|digits_between:6,8|numeric',
            'telefono' => 'required|digits_between:7,7|numeric',
            'direccion' => 'required',
            'id_especialidad' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'El campo Nombres es obligatorio',
            'apellidos.required' => 'El campo Apellidos es obligatorio',
            'cedula.required' => 'El campo Cédula es obligatorio',
            'telefono.required' => 'El campo Teléfono es obligatorio',
            'direccion.required' => 'El campo Dirección es obligatorio',
            'id_especialidad.required' => 'La Especialidad es obligatoria',
            'telefono.numeric' => 'En el campo Teléfono debe ingresar sólo números',
            'cedula.numeric' => 'En el campo Cédula debe ingresar sólo números'
        ]
    }
}
