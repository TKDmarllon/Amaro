<?php

namespace App\Http\Controllers;

use App\Exceptions\produtosException;
use App\Models\Produtos;
use App\Service\ProdutosService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdutosController extends Controller
{
    private $produtosService;

    public function __construct(
        ProdutosService $produtosService,
    ){
        $this->produtosService = $produtosService;
    }

    public function criarProduto(Request $request):JsonResponse
    {
        try{
            $protudo = new Produtos($request->all());
            $criado = $this->produtosService->enviaRepository($protudo);
                return new JsonResponse($criado, Response::HTTP_CREATED);
        } catch(produtosException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }
    
    public function buscarProdutoId($id)
    {
        return $this->produtosService->enviaConsultaId($id);
    }

    public function buscarProdutoSku($sku)
    {
        return $this->produtosService->enviaConsultaSku($sku);
    }

    public function buscarProdutoNome($nome)
    {
        return $this->produtosService->enviaConsultaNome($nome);
    }

    public function atualizarProduto(Request $request,$id)
    {
        try{
            $atualizacao = new Produtos($request->all());
            $atualizado=$this->produtosService->enviarAtualizacao($atualizacao,$id);
                return new JsonResponse($atualizado, Response::HTTP_OK);
        } catch(produtosException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }
}
