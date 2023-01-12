<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstoqueRequest extends AbstractRequest
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
            'pp'=>['numeric','gt:0'],
            'p'=>['numeric','gt:0'],
            'm'=>['numeric','gt:0'],
            'g'=>['numeric','gt:0'],
            'gg'=>['numeric','gt:0']

        ];
    }

    public function messages()
    {
        return[
            'pp.numeric'=>'Preencha o campo somente com números',
            'pp.gt'=>'Quantidade precisa ser maior que zero',
            'p.numeric'=>'Preencha o campo somente com números',
            'p.gt'=>'Quantidade precisa ser maior que zero',
            'm.numeric'=>'Preencha o campo somente com números',
            'm.gt'=>'Quantidade precisa ser maior que zero',
            'g.numeric'=>'Preencha o campo somente com números',
            'g.gt'=>'Quantidade precisa ser maior que zero',
            'gg.numeric'=>'Preencha o campo somente com números',
            'gg.gt'=>'Quantidade precisa ser maior que zero'
        ];
    }
}
