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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ];
    }

    public function messages(){
        return [
            'name.required'    => 'El nombre es requerido',
            'name.string'    => 'El nombre no es válido',
            'name.max'    => 'El nombre es demasiado largo (255 máx.)',
            'email.required'    => 'El correo es requerido',
            'email.string'    => 'El correo no es válido',
            'email.email'    => 'El correo no es válido',
            'email.max'    => 'El correo es demasiado largo (255 máx.)',
            'email.unique'    => 'El correo ya está registrado',
            'password.required'    => 'La contraseña es requerida',
            'password.string'    => 'La contraseña no es válida',
            'password.min'    => 'La contraseña es demasiado corta (8 Min.)',
            'password.confirmed'    => 'Las contraseñas no coinciden',
            'role.required' => 'El rol es requerido'
        ];
    }
}
