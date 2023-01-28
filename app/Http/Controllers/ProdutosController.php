<?php

namespace App\Http\Controllers;

use App\Exceptions\produtosException;
use App\Http\Requests\AtualizacaoProdutosRequest;
use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;
use App\Service\ProdutosService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProdutosController extends Controller
{
    public function __construct(private ProdutosService $produtosService,)
    {}

    public function criarProduto(ProdutosRequest $request):JsonResponse
    {
        try {
            $protudo = new Produtos($request->all());
            $criado = $this->produtosService->criarProduto($protudo);
                return new JsonResponse("Produto $criado->nome criado com sku $criado->sku",
                                         Response::HTTP_CREATED);
        } catch(produtosException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }
    
    public function buscarProdutoId(int $id):Produtos
    {
        return $this->produtosService->buscarProdutoId($id);
    }

    public function buscarProdutoSku(int $sku):JsonResponse
    {
        return $this->produtosService->buscarProdutoSku($sku);
    }

    public function buscarProdutoNome(string $nome):JsonResponse
    {
        return $this->produtosService->buscarProdutoNome($nome);
    }

    public function atualizarProduto(AtualizacaoProdutosRequest $request,int $id):JsonResponse
    {
        try {
            $atualizacao=new Produtos($request->all());
            return $this->produtosService->atualizarProduto($atualizacao,$id);
        } catch(produtosException $e){
            return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function deletarProduto(int $id):JsonResponse
    {
        return $this->produtosService->deletarProduto($id);
    }
}
