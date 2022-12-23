<?php

namespace App\Http\Controllers;

use App\Service\ProdutosService;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    private $produtosService;

    public function __construct(
        ProdutosService $produtosService,
    ){
        $this->ProdutosService = $produtosService;
    }
}
