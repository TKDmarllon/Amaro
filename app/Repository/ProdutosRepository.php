<?php

namespace App\Repository;

use App\Models\Produtos;
use App\Models\Tamanhos;
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
              Produtos::findorfail($id)->Tamanhos()->get()];
    return New JsonResponse($produto);
}

public function consultaSku($sku)
{
    return Produtos::where($sku,'sku');
}

public function consultaNome($nome):Collection
{
    return Produtos::where('nome',$nome)->get();
}

public function salvarAtualizacao($produto):void
{
    Produtos::saved($produto['id']);
}
}
