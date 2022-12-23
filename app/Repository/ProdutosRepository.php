<?php

namespace App\Repository;

use App\Models\Produtos;

class ProdutosRepository {

public function salvaProduto(Produtos $produto):Produtos
{
    return Produtos::create($produto->getAttributes());
}

public function consultaId($id):Produtos
{
    return Produtos::findorfail($id);
}

public function consultaSku($sku):Produtos
{
    return Produtos::where('sku',$sku)->get();
}

public function consultaNome($nome):Produtos
{
    return Produtos::where('nome',$nome)->get();
}
}
