<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;

class UpdateUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $user = User::findOrFail($request->id);

        return [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
        ];
    }

    public function messages(){
        return [
            'name.required'    => 'El nombre es requerido',
            'name.string'    => 'El nombre no es válido',
            'name.max'    => 'El nombre es demasiado largo (255 máx.)',
            'role.required' => 'El rol es requerido'
        ];
    }
}
