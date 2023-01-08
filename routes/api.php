<?php

use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(ProdutosController::class)->group(function()
{
    Route::get("/produtos/id/{id}","buscarProdutoId")
    ->name('buscar.produtoId');

    Route::get("/produtos/sku/{sku}","buscarProdutoSku")
    ->name('buscar.sku');

    Route::get("/produtos/nome/{nome}","buscarProdutoNome")
    ->name('buscar.nome');

    Route::post("/produtos/cadastro","criarProduto")
    ->name('criar.produto');

    Route::put("/produtos/atualizacao/{id}","atualizarProduto")
    ->name('atualizar.produto');
});

Route::controller(EstoqueController::class)->group(function()
{
    Route::get("/estoque/id/{id}","consultarEstoque")
    ->name('buscar.estoqueId');

    Route::delete("/estoque/id/{id}","deletarEstoque")
    ->name('deletar.estoque');

    Route::post("/estoque/cadastro","criarEstoque")
    ->name('criar.estoque');

    Route::put("/estoque/atualizar","atualizarEstoque")
    ->name('atualizar.estoque');
});