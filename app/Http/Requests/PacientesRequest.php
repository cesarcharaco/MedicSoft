<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientesRequest extends FormRequest
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
            'institucion' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|digits_between:6,8|numeric',
            'telefono' => 'required|digits_between:7,7|numeric',
            'direccion' => 'required',
            'genero' => 'required',
            'edad' => 'required|numeric|digits_between:0,99'
        ];
    }
}
