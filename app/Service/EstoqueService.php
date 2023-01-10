<?php

namespace App\Service;

use App\Models\Estoque;
use App\Repository\EstoqueRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EstoqueService
{
    protected $estoqueRepository;

    public function __construct(EstoqueRepository $estoqueRepository)
    {
        $this->estoqueRepository = $estoqueRepository;
    }

    public function enviarEstoque(Estoque $estoque):Estoque
    {
        return $this->estoqueRepository->inserirEstoque($estoque);
    }

    public function enviaConsulta($id):Collection
    {
        return $this->estoqueRepository->consultarEstoque($id);
    }

    public function atualizarEstoque(Estoque $estoqueNovo,$id)
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

        $this->estoqueRepository->salvarAtualizado($atualizarEstoque);
        
    }

    public function deletarEstoque($id):JsonResponse
    {
        $exclusao=$this->estoqueRepository->consultarEstoque($id);
        if (is_null($exclusao)) {
            return new JsonResponse("Estoque não encontrado.",Response::HTTP_NOT_FOUND);
        }
            $this->estoqueRepository->destruirEstoque($id);
            return new JsonResponse("Estoque excluído.",Response::HTTP_OK);
    }
}
