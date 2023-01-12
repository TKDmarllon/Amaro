<?php

namespace App\Service;

use App\Models\Produtos;
use App\Repository\ProdutosRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProdutosService 
{
    protected $produtosRepository;
    
    public function __construct(ProdutosRepository $produtosRepository)
    {
        $this->produtosRepository = $produtosRepository;
    }

    public function gerarSku()
    {
        $numero=rand(10000,99999);
        $numero=str_pad($numero,7,0,STR_PAD_LEFT);
        $numeroExiste=$this->produtosRepository->verificaSku($numero);

        if ($numeroExiste) {
            return $this->gerarSku();
        }
        return $numero;
    }

    public function enviaRepository($produto):Produtos
    {
        $numeroSku=$this->gerarSku();
        $produto->sku=$numeroSku;

        return $this->produtosRepository->salvaProduto($produto);
    }

    public function enviaConsultaId($id)
    {
        return $this->produtosRepository->consultaId($id);
    }

    public function enviaConsultaSku($sku):Collection
    {
        return $this->produtosRepository->consultaSku($sku);
    }
    
    public function enviaConsultaNome($nome):Collection
    {
        return $this->produtosRepository->consultaNome($nome);
    }

    public function enviarAtualizacao($atualizacao, $id):void
    {
        $produto = $this->produtosRepository->ConsultaId($id);
        $produto->update([
                'nome'=>$atualizacao->nome,
                'valor'=>$atualizacao->valor, 
                'cor'=>$atualizacao->cor,
                'genero'=>$atualizacao->genero
                ]);

        $this->produtosRepository->salvarAtualizacao($produto);
    }
    
    public function enviarExclusao($id)
    {
        $exclusao=$this->produtosRepository->consultaId($id);

        if (is_null($exclusao)) {
            return new JsonResponse("Produto não encontrado.",Response::HTTP_NOT_FOUND);
        }
            $this->produtosRepository->deletarId($id);
            return new JsonResponse("produto excluído.",Response::HTTP_OK);
    }
}
