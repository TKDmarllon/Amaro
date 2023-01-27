<?php

use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsersController;
use App\Mail\NovoProduto;
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
    Route::post("/produtos/cadastro","criarProduto")
    ->name('criar.produto');

    Route::get("/produtos/id/{id}","buscarProdutoId")
    ->name('buscar.produtoId');

    Route::get("/produtos/sku/{sku}","buscarProdutoSku")
    ->name('buscar.sku');

    Route::get("/produtos/nome/{nome}","buscarProdutoNome")
    ->name('buscar.nome');

    Route::put("/produtos/atualizacao/{id}","atualizarProduto")
    ->name('atualizar.produto');

    Route::delete("/produtos/id/{id}","deletarProduto")
    ->name('deletar.produto');

});

Route::controller(EstoqueController::class)->group(function()
{   
     Route::post("/estoque/cadastro","criarEstoque")
    ->name('criar.estoque');

    Route::get("/estoque/id/{id}","consultarEstoque")
    ->name('buscar.estoqueId');

    Route::put("/estoque/atualizar/{id}","atualizarEstoque")
    ->name('atualizar.estoque');

    Route::delete("/estoque/id/{id}","deletarEstoque")
    ->name('deletar.estoque');
});

Route::controller(UsersController::class)->group(function()
{    
    Route::post("/usuario/cadastro","criarUsuario")
    ->name('criar.usuario');

    Route::get("/usuario/id/{id}","buscarUsuario")
    ->name('buscar.usuario');

    Route::put("/usuario/atualizacao/{id}","atualizarUsuario")
    ->name('atualizar.usuario');

    Route::delete("/usuario/id/{id}","deletarUsuario")
    ->name('deletar.usuario');

});

Route::get('/email', function(){
    return new NovoProduto('casaco',100,'preto',2);
});