<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class AtualizacaoUserRequest extends AbstractRequest
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
            'nome'=>'max:126',
            'password'=>['confirmed', Password::min(8)->numbers()->mixedCase()]
        ];
    }

    public function messages()
    {
        return [
            'nome.max'=>'O campo nome pode ter no maximo :max caracteres',
            'password'=>'O password precisa ter 8 digitos, números, letras maiúsculas e minúsculas',
            'password.confirmed'=>"O e-mail e a confirmação de e-mail precisam ser identicas."
        ];
    }
}
