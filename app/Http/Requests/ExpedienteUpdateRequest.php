<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteUpdateRequest extends FormRequest
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
            'num_caja' => 'required',
            'tipo_exp' => 'required',
            'num_exp' => 'required',
            'n_junta' => 'required',
            'ano' => 'required',
            'adicional' => 'required',
            'actor' => 'required',
            'demandado' => 'required',
            'concepto' => 'required',
            'procedencia' => 'required',
            'tiempo_archivo' => 'required',
            'num_legajos' => 'required',
            'num_hojas' => 'required',
            'observaciones' => 'required',
            'fecha_obs' => 'required',
        ];
    }

    public function messages(){
        return [
            'num_caja.required' => 'Este campo es requerido',
            'tipo_exp.required' => 'Este campo es requerido',
            'num_exp.required' => 'Este campo es requerido',
            'n_junta.required' => 'Este campo es requerido',
            'ano.required' => 'Este campo es requerido',
            'adicional.required' => 'Este campo es requerido',
            'actor.required' => 'Este campo es requerido',
            'demandado.required' => 'Este campo es requerido',
            'concepto.required' => 'Este campo es requerido',
            'procedencia.required' => 'Este campo es requerido',
            'tiempo_archivo.required' => 'Este campo es requerido',
            'num_legajos.required' => 'Este campo es requerido',
            'num_hojas.required' => 'Este campo es requerido',
            'observaciones.required' => 'Este campo es requerido',
            'fecha_obs.required' => 'Este campo es requerido',
        ];
    }
}
