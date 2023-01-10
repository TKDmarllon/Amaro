<?php

namespace App\Repository;

use App\Models\Estoque;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EstoqueRepository
{
    public function inserirEstoque(Estoque $estoque):Estoque
    {
        return Estoque::create($estoque->getAttributes());
    }

    public function consultarEstoque($id):Collection
    {
        return Estoque::where('produtos_id',$id)->get();
    }

    public function salvarAtualizado($atualizarEstoque)
    {
        Estoque::saved($atualizarEstoque);
    }

    public function destruirEstoque($id)
    {
        Estoque::findorfail($id)->delete();
    }
}