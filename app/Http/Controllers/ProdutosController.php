<?php

namespace App\Http\Controllers;

use App\Exceptions\produtosException;
use App\Http\Requests\AtualizacaoProdutosRequest;
use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;
use App\Service\ProdutosService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProdutosController extends Controller
{
    private $produtosService;

    public function __construct(ProdutosService $produtosService,)
    {
        $this->produtosService = $produtosService;
    }

    public function criarProduto(ProdutosRequest $request):JsonResponse
    {
        try {
            $protudo = new Produtos($request->all());
            $criado = $this->produtosService->enviaRepository($protudo);
                return new JsonResponse("Produto $criado->nome criado com sku $criado->sku",
                                         Response::HTTP_CREATED);
        } catch(produtosException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }
    
    public function buscarProdutoId($id)
    {
        return $this->produtosService->enviaConsultaId($id);
    }

    public function buscarProdutoSku($sku):Collection
    {
        return $this->produtosService->enviaConsultaSku($sku);
    }

    public function buscarProdutoNome($nome):Collection
    {
        return $this->produtosService->enviaConsultaNome($nome);
    }

    public function atualizarProduto(AtualizacaoProdutosRequest $request,$id):JsonResponse
    {
        try {
            $atualizacao=new Produtos($request->all());
            $this->produtosService->enviarAtualizacao($atualizacao,$id);
                return new JsonResponse("Atualização realizada", Response::HTTP_OK);
        } catch(produtosException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function deletarProduto($id)
    {
        return $this->produtosService->EnviarExclusao($id);
    }
}
