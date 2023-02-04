<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class UserRequest extends AbstractRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome'=>['required','max:126'],
            'email'=>['required','email','unique:App\Models\User,email'],
            'password'=>['required','confirmed', Password::min(8)->numbers()->mixedCase()]
        ];
    }

    public function messages()
    {
        return [
            'nome.required'=>"Preencha o campo 'nome'",
            'nome.max'=>'O campo nome pode ter no maximo :max caracteres',
            'email.required'=>"Preencha o campo 'email'",
            'email.unique'=>"Email já utilizado.",
            'email.email'=>"Informe um e-mail válido.",
            'password'=>'O password precisa ter 8 digitos, números, letras maiúsculas e minúsculas',
            'password.required'=>"Preencha o campo 'password'",
            'password.confirmed'=>"O e-mail e a confirmação de e-mail precisam ser identicas."
        ];
    }
}
