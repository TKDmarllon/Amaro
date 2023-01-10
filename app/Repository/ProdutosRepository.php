<?php

namespace App\Repository;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProdutosRepository 
{
    public function salvaProduto(Produtos $produto):Produtos
    {
        return Produtos::create($produto->getAttributes());
    }

    public function consultaId($id):Produtos
    {
        return Produtos::find($id); 
    }

    public function consultaSku($sku):Collection
    {
        return Produtos::where('sku',$sku)->get();
    }

    public function consultaNome($nome):Collection
    {
        return Produtos::where('nome',$nome)->get();
    }

    public function salvarAtualizacao($produto):void
    {
        Produtos::saved($produto['id']);
    }

    public function deletarId($id):void
    {
        Produtos::destroy($id);
    }

    public function verificaSku(String $numero)
    {
        return DB::table('produtos')->where('sku', $numero)->exists();
    }
    }
