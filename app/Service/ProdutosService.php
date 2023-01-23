<?php

namespace App\Service;

use App\Events\ProdutoCriado;
use App\Models\Produtos;
use App\Repository\ProdutosRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProdutosService 
{    
    public function __construct(protected ProdutosRepository $produtosRepository,)
    {}

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

    public function enviaRepository(Produtos $produto):Produtos
    {
        $produto->sku=$this->gerarSku();
        $produtoCriado=$this->produtosRepository->salvaProduto($produto);
        ProdutoCriado::dispatch($produtoCriado);
        return $produtoCriado;
    }

    public function enviaConsultaId(int $id):Produtos
    {
        return $this->produtosRepository->consultaId($id);
    }

    public function enviaConsultaSku(int $sku):JsonResponse
    {
        $skuBuscado=$this->produtosRepository->consultaSku($sku);
        if ($skuBuscado->isEmpty()){
            return new JsonResponse($skuBuscado,Response::HTTP_NOT_FOUND);
        };
        return new JsonResponse($skuBuscado,Response::HTTP_OK);
    }
    
    public function enviaConsultaNome(string $nome):JsonResponse
    {
        $nomeBuscado = $this->produtosRepository->consultaNome($nome);
        if ($nomeBuscado->isEmpty()) {
            return new JsonResponse($nomeBuscado,Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse($nomeBuscado,Response::HTTP_OK);
    }

    public function enviarAtualizacao(mixed $atualizacao,int $id):JsonResponse
    {
        $produto = $this->produtosRepository->ConsultaId($id);

        if (is_null($produto)) {
        return new JsonResponse("Produto não encontrado.",Response::HTTP_NOT_FOUND);
        }
        $produto->update([
                'nome'=>$atualizacao->nome,
                'valor'=>$atualizacao->valor, 
                'cor'=>$atualizacao->cor,
                'genero'=>$atualizacao->genero
                ]);

        $this->produtosRepository->salvarAtualizacao($produto);
        return new JsonResponse("Produto atualizado.",Response::HTTP_ACCEPTED);
    }
    
    public function enviarExclusao(int $id):JsonResponse
    {
        $exclusao=$this->produtosRepository->consultaId($id);

        if (is_null($exclusao)) {
            return new JsonResponse("Produto não encontrado.",Response::HTTP_NOT_FOUND);
        }
            $this->produtosRepository->deletarId($id);
            return new JsonResponse("Produto excluído.",Response::HTTP_OK);
    }
}
