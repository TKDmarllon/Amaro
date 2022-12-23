<?php

namespace App\Service;

use App\Repository\ProdutosRepository;

class ProdutosService {

    protected $produtosService;
    

    public function __construct(ProdutosRepository $produtosRepository){
        $this->produtosRepository = $produtosRepository;
    }
}
