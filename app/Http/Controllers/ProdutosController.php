<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Service\ProdutosService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    private $produtosService;

    public function __construct(
        ProdutosService $produtosService,
    ){
        $this->produtosService = $produtosService;
    }

    public function criarProduto(Request $request):Produtos
    {
        $protudo = new Produtos($request->all());
        return $this->produtosService->enviaRepository($protudo);
    }

    public function buscarProdutoId($id):Produtos
    {
        return $this->produtosService->enviaConsultaId($id);
    }

    public function buscarProdutoSku($sku):Produtos
    {
        return $this->produtosService->enviaConsultaSku($sku);
    }

    public function buscarProdutoNome($nome):Produtos
    {
        return $this->produtosService->enviaConsultaNome($nome);
    }


}
