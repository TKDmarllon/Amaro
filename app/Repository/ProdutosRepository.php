<?php

namespace App\Repository;

use App\Models\Produtos;
use App\Models\Estoque;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ProdutosRepository {

public function salvaProduto(Produtos $produto):Produtos
{
    return Produtos::create($produto->getAttributes());
}

public function consultaId($id)
{
    $produto=[Produtos::findorfail($id),
              Produtos::findorfail($id)->Estoque()->get()];
    return New JsonResponse($produto);
}

public function consultaSku($sku)
{
    return Produtos::where('sku',$sku)->get();

}

public function consultaNome($nome):Collection
{
    return Produtos::where('nome',$nome)->get();
}

public function consultaEstoque($id)
{
    return Estoque::where('produtos_id',$id)->get();
}

public function salvarAtualizacao($produto):void
{
    Produtos::saved($produto['id']);
}
}
