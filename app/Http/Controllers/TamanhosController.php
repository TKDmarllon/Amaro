<?php

namespace App\Http\Controllers;

use App\Exceptions\estoqueException;
use App\Models\Estoque;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EstoqueController extends Controller
{
    protected $estoqueService;

    public function __construct(Estoque $estoqueService)
    {
        $this->estoqueService = $estoqueService;
    }

    public function criarEstoque(Request $request)
    {
        try{
            $estoque = new Estoque($request->all());
            $criado = $this->estoqueService->enviarEstoque($estoque);
                return new JsonResponse($criado, Response::HTTP_CREATED);
        } catch(estoqueException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function consultarEstoque($id)
    {
        return $this->estoqueService->enviaconsulta($id);
    }

    public function AtualizarEstoque(Request $request, $id)
    {
        try{
            $estoqueNovo = new Estoque($request->all());
            $atualizado = $this->estoqueService->enviaEstoque($estoqueNovo);
                return new JsonResponse($atualizado, Response::HTTP_OK);
        } catch(estoqueException $e){
                return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function deletarEstoque($id)
    {
        $this->estoqueService->excluirEstoque($id);
    }
}
