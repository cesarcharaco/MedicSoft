<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultasRequest extends FormRequest
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
            'id_paciente' => 'required',
            'id_tipoconsulta' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_paciente.required'      => 'No ha selecionado ningún paciente',
            'id_tipoconsulta.required'    => 'No ha seleccionado ningún tipo de Consulta'
  
        ];
    }
}
