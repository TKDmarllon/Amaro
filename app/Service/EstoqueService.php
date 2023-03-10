<?php

namespace App\Service;

use App\Models\Estoque;
use App\Repository\EstoqueRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EstoqueService
{
    public function __construct(protected EstoqueRepository $estoqueRepository)
    {}

    public function criarEstoque(Estoque $estoque):Estoque
    {
        return $this->estoqueRepository->criarEstoque($estoque);
    }

    public function consultarEstoque(int $id):JsonResponse
    {
        $estoque=$this->estoqueRepository->consultarEstoque($id);
        if ($estoque->isEmpty()) {
            return new JsonResponse($estoque,Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse($estoque,Response::HTTP_OK);
    }

    public function AtualizarEstoque(Estoque $estoqueNovo,$id):void
    {
        $buscarEstoque=$this->estoqueRepository->consultarEstoque($id);
        $atualizarEstoque=$buscarEstoque[0];
        $atualizarEstoque->update([
                            'pp'=> $estoqueNovo->pp,
                            'p'=> $estoqueNovo->p,
                            'm'=> $estoqueNovo->m,
                            'g'=> $estoqueNovo->g,
                            'gg'=> $estoqueNovo->gg
                            ]);

        $this->estoqueRepository->AtualizarEstoque($atualizarEstoque);   
    }

    public function deletarEstoque(int $id):JsonResponse
    {
        $exclusao=$this->estoqueRepository->consultarEstoque($id);
        if ($exclusao->isEmpty()) {
            return new JsonResponse("Estoque não encontrado.",Response::HTTP_NOT_FOUND);
        }
            $this->estoqueRepository->deletarEstoque($id);
            return new JsonResponse("Estoque excluído.",Response::HTTP_OK);
    }
}
