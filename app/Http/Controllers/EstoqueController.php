<?php

namespace App\Http\Controllers;

use App\Exceptions\estoqueException;
use App\Http\Requests\EstoqueRequest;
use App\Models\Estoque;
use App\Service\EstoqueService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EstoqueController extends Controller
{
    public function __construct(protected EstoqueService $estoqueService)
    {}

    public function criarEstoque(EstoqueRequest $request):JsonResponse
    {
        try{
            $estoque = new Estoque($request->all());
            $criado=$this->estoqueService->enviarEstoque($estoque);
                return new JsonResponse($criado, Response::HTTP_CREATED);
        } catch(estoqueException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function consultarEstoque(int $id):JsonResponse
    {
        return $this->estoqueService->enviaconsulta($id);
    }

    public function AtualizarEstoque(EstoqueRequest $request, $id):JsonResponse
    {
        try{
            $estoqueNovo = new Estoque($request->all());
            $atualizado = $this->estoqueService->atualizarEstoque($estoqueNovo,$id);
                return new JsonResponse($atualizado, Response::HTTP_OK);
        } catch(estoqueException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function deletarEstoque(int $id):JsonResponse
    {
        return $this->estoqueService->deletarEstoque($id);
    }
}
