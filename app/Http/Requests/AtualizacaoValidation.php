<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AtualizacaoValidation extends FormRequest
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
            'nome'=>'required',
            'sku'=>'required',
            'valor'=>'required',
            'cor'=>'required',
            'estoque'=>'required|gt:0',
            'tamanho'=>'required',
            'genero'=>['required',
                    Rule::in('m','f','i')]
        ];
    }
}
