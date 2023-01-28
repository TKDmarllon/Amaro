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

    public function criarProduto(Produtos $produto):Produtos
    {
        $produto->sku=$this->gerarSku();
        $produtoCriado=$this->produtosRepository->criarProduto($produto);
        ProdutoCriado::dispatch($produtoCriado);
        return $produtoCriado;
    }

    public function buscarProdutoId(int $id):Produtos
    {
        return $this->produtosRepository->buscarProdutoId($id);
    }

    public function buscarProdutoSku(int $sku):JsonResponse
    {
        $skuBuscado=$this->produtosRepository->buscarProdutoSku($sku);
        if ($skuBuscado->isEmpty()){
            return new JsonResponse($skuBuscado,Response::HTTP_NOT_FOUND);
        };
        return new JsonResponse($skuBuscado,Response::HTTP_OK);
    }
    
    public function buscarProdutoNome(string $nome):JsonResponse
    {
        $nomeBuscado = $this->produtosRepository->buscarProdutoNome($nome);
        if ($nomeBuscado->isEmpty()) {
            return new JsonResponse($nomeBuscado,Response::HTTP_NOT_FOUND);
        }
        return new JsonResponse($nomeBuscado,Response::HTTP_OK);
    }

    public function atualizarProduto(mixed $atualizacao,int $id):JsonResponse
    {
        $produto = $this->produtosRepository->buscarProdutoId($id);

        if (is_null($produto)) {
        return new JsonResponse("Produto não encontrado.",Response::HTTP_NOT_FOUND);
        }
        $produto->update([
                'nome'=>$atualizacao->nome,
                'valor'=>$atualizacao->valor, 
                'cor'=>$atualizacao->cor,
                'genero'=>$atualizacao->genero
                ]);

        $this->produtosRepository->atualizarProduto($produto);
        return new JsonResponse("Produto atualizado.",Response::HTTP_ACCEPTED);
    }
    
    public function deletarProduto(int $id):JsonResponse
    {
        $exclusao=$this->produtosRepository->buscarProdutoId($id);

        if (is_null($exclusao)) {
            return new JsonResponse("Produto não encontrado.",Response::HTTP_NOT_FOUND);
        }
            $this->produtosRepository->deletarProduto($id);
            return new JsonResponse("Produto excluído.",Response::HTTP_OK);
    }
}
