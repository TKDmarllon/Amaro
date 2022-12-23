<?php

namespace App\Service;

use App\Models\Produtos;
use App\Repository\ProdutosRepository;
use Illuminate\Http\JsonResponse;

class ProdutosService {

    protected $produtosService;
    

    public function __construct(ProdutosRepository $produtosRepository){
        $this->produtosRepository = $produtosRepository;
    }

    public function enviaRepository(Produtos $produto):Produtos
    {
        return $this->produtosRepository->salvaProduto($produto);
    }

    public function enviaConsultaId($id):Produtos
    {
        return $this->produtosRepository->consultaId($id);
    }

    public function enviaConsultaSku($sku):Produtos
    {
        return $this->produtosRepository->consultaSku($sku);
    }
    
    public function enviaConsultaNome($nome):Produtos
    {
        return $this->produtosRepository->consultaNome($nome);
    }
}
