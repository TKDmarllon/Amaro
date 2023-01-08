<?php

namespace App\Service;

use App\Models\Estoque;

class EstoqueService
{
    protected $estoqueRepository;

    public function __construct($estoqueRepository)
    {
        $this->estoqueRepository = $estoqueRepository;
    }

    public function enviarEstoque(Estoque $estoque)
    {
        return $this->estoqueRepository->inserirEstoque($estoque);
    }

    public function enviaConsulta($id)
    {
        return $this->estoqueRepository->consultarEstoque($id);
    }

    public function atualizarEstoque(Estoque $estoqueNovo)
    {
        $atualizarEstoque=$estoqueNovo->id;
        return $this->estoqueRepository->salvarAtualizado($estoqueNovo);
    }

    public function deletarEstoque($id)
    {
        return $this->estoqueRepository->destruirEstoque($id);
    }
}
