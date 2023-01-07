<?php

namespace App\Service;

use App\Models\Produtos;
use App\Repository\ProdutosRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ProdutosService {

    protected $produtosRepository;
    

    public function __construct(ProdutosRepository $produtosRepository){
        $this->produtosRepository = $produtosRepository;
    }

    public function enviaRepository(Produtos $produto):Produtos
    {
        return $this->produtosRepository->salvaProduto($produto);
    }

    public function enviaConsultaId($id)
    {
        return $this->produtosRepository->consultaId($id);
    }

    public function enviaConsultaSku($sku)
    {
        return $this->produtosRepository->consultaSku($sku);
    }
    
    public function enviaConsultaNome($nome):Collection
    {
        return $this->produtosRepository->consultaNome($nome);
    }

    public function enviarAtualizacao($atualizacao, $id)
    {
        $produto = $this->enviaConsultaId($id);
        $produto ->update([
            'nome'=>$atualizacao['nome'],
            'valor'=>$atualizacao['valor'], 
            'cor'=>$atualizacao['cor'],
            'estoque'=>$atualizacao['estoque']
        ]);
        return $this->produtosRepository->salvarAtualizacao($produto);
    }
}
