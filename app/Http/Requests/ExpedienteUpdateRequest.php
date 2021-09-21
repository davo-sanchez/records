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
            'num_caja' => 'nullable|min:1|max:2',
            'tipo_exp' => 'required',
            'num_exp' => 'required',
            'n_junta' => 'required',
            'ano' => 'required',
            'actor' => 'required',
            'demandado' => 'required',
            'concepto' => 'required',
            'procedencia' => 'required',
            'tiempo_archivo' => 'required',
            'num_legajos' => 'required',
            'num_hojas' => 'required',
            'observaciones' => 'nullable',
            'fecha_apertura' => 'required|date',
            'fecha_cierre' => 'nullable|date',
            'holder' => 'required'
        ];
    }

    public function messages(){
        return [
            'num_caja.min' => 'Este campo debe contener al menos 1 letra',
            'num_caja.max' => 'Este campo debe contener como máximo 2 letras',
            'tipo_exp.required' => 'Este campo es requerido',
            'num_exp.required' => 'Este campo es requerido',
            'n_junta.required' => 'Este campo es requerido',
            'ano.required' => 'Este campo es requerido',
            'actor.required' => 'Este campo es requerido',
            'demandado.required' => 'Este campo es requerido',
            'concepto.required' => 'Este campo es requerido',
            'procedencia.required' => 'Este campo es requerido',
            'tiempo_archivo.required' => 'Este campo es requerido',
            'num_legajos.required' => 'Este campo es requerido',
            'num_hojas.required' => 'Este campo es requerido',
            'observaciones.required' => 'Este campo es requerido',
            'fecha_apertura.required' => 'Este campo es requerido',
            'fecha_apertura.date' => 'Este campo no es una fecha válida',
            'fecha_cierre.date' => 'Este campo no es una fecha válida',
            'holder.required' => 'Este campo es requerido'
        ];
    }
}
