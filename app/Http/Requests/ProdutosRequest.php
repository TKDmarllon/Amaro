<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProdutosRequest extends FormRequest
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
	            'nome'=>'required','max:126',
	            'valor'=>'requied','numeric','gt:0',
	            'cor'=>'required',
	            'genero'=>'required',[Rule::in('f','m')]
        ];
    }

    public function messages()
    {
        return [
            'nome.required'=>'Preencha o campo "nome"',
            'nome.max'=>'O campo nome pode ter no maximo 126 caracteres',
            'valor.required'=>'Preencha o campo "valor"',
            'valor.numeric'=>'Digite apenas números no campo "valor',
            'valor.gt'=>' valor precisa ser positivo',
            'cor.required'=>'Preencha o campo "cor"',
            'genero'=>'O campo genero deve ser preenchido com "f" ou "m"',
        ];
    }
}
