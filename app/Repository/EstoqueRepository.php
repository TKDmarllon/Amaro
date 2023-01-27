<?php

namespace App\Repository;

use App\Models\Estoque;
use Illuminate\Database\Eloquent\Collection;

class EstoqueRepository
{
    public function inserirEstoque(Estoque $estoque):Estoque
    {
        return Estoque::create($estoque->getAttributes());
    }

    public function consultarEstoque(int $id):Collection
    {
        return Estoque::where('produtos_id',$id)->get();
    }

    public function salvarAtualizado(mixed $atualizarEstoque):void
    {
        Estoque::saved($atualizarEstoque);
    }

    public function destruirEstoque(int $id):void
    {
        Estoque::findorfail($id)->delete();
    }
}