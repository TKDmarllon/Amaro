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

    public function consultaId(int $id):Produtos|null
    {
        return Produtos::findOrFail($id); 
    }

    public function consultaSku(int $sku):Collection
    {
        return Produtos::where('sku',$sku)->get();
    }

    public function consultaNome(string $nome):Collection
    {
        return Produtos::where('nome',$nome)->get();
    }

    public function salvarAtualizacao(mixed $produto):void
    {
        Produtos::saved($produto['id']);
    }

    public function deletarId(int $id):void
    {
        Produtos::destroy($id);
    }

    public function verificaSku(String $numero)
    {
        return DB::table('produtos')->where('sku', $numero)->exists();
    }
    }
