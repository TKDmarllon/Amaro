<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class AtualizacaoProdutosRequest extends AbstractRequest
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
	            'valor'=>['numeric','gt:9'],
	            'genero'=>[Rule::in(['f','m'])]
        ];
    }

    public function messages()
    {
        return [
            'nome.max'=>'O campo nome pode ter no maximo :max caracteres',
            'valor.numeric'=>"Digite apenas números no campo 'valor'",
            'valor.gt'=>'O valor precisa ser positivo',
            'genero'=>"O campo genero deve ser preenchido com 'f' ou 'm'",
        ];
    }
}

