<?php

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

Route::post("/produtos/cadastro",[ProdutosController::class, "criarProduto"])->name('criar.produto');
Route::get("/produtos/id/{id}",[ProdutosController::class, "buscarProdutoId"])->name('busca.id');
Route::get("/produtos/sku/{sku}",[ProdutosController::class, "buscarProdutoSku"])->name('busca.sku');
Route::get("/produtos/nome/{nome}", [ProdutosController::class, "buscarProdutoNome"])->name('buscar.nome');
