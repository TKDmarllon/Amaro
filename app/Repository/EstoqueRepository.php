<?php

namespace App\Repository;

use App\Models\Estoque;

class EstoqueRepository
{
    public function inserirEstoque(Estoque $estoque)
    {
        Estoque::created($estoque);
    }

    public function consultarEstoque($id)
    {
        return Estoque::findorfail($id);
    }

    public function salvarAtualizado(Estoque $dadosNovoEstoque)
    {
        return $this->
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }
}