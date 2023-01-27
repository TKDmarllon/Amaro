<?php

namespace App\Repository;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProdutosRepository 
{
    public function criarProduto(Produtos $produto):Produtos
    {
        return Produtos::create($produto->getAttributes());
    }

    public function buscarProdutoId(int $id):Produtos|null
    {
        return Produtos::findOrFail($id); 
    }

    public function buscarProdutoSku(int $sku):Collection
    {
        return Produtos::where('sku',$sku)->get();
    }

    public function buscarProdutoNome(string $nome):Collection
    {
        return Produtos::where('nome',$nome)->get();
    }

    public function atualizarProduto(mixed $produto):void
    {
        Produtos::saved($produto['id']);
    }

    public function deletarProduto(int $id):void
    {
        Produtos::destroy($id);
    }

    public function verificaSku(String $numero)
    {
        return DB::table('produtos')->where('sku', $numero)->exists();
    }
    }
