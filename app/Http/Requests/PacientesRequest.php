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
            'cedula' => 'required|min:6|max:8|numeric',
            'telefono' => 'required|min:7|max:7|numeric',
            'direccion' => 'required'
        ];
    }
}
