<?php

namespace App\Repository;

use App\Models\Estoque;
use Illuminate\Database\Eloquent\Collection;

class EstoqueRepository
{
    public function criarEstoque(Estoque $estoque):Estoque
    {
        return Estoque::create($estoque->getAttributes());
    }

    public function consultarEstoque(int $id):Collection
    {
        return Estoque::where('produtos_id',$id)->get();
    }

    public function AtualizarEstoque(mixed $atualizarEstoque):void
    {
        Estoque::saved($atualizarEstoque);
    }

    public function deletarEstoque(int $id):void
    {
        Estoque::findorfail($id)->delete();
    }
}