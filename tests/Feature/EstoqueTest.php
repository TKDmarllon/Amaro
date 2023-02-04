<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstoqueTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_criarEstoque()
    {
        $response = $this->post(route('criar.estoque'),[
        "produtos_id"=>'1',
        "pp"=>'2',
        "p"=>'6',
        "m"=>'7',
        "g"=>'5',
        "gg"=>'4',
        ]);
        $response->assertStatus(201);
    }

    public function test_criarEstoqueErroCaracter()
    {
        $response = $this->post(route('criar.estoque'),[
        "produtos_id"=>'1',
        "pp"=>'2',
        "p"=>'k',
        "m"=>'7',
        "g"=>'5',
        "gg"=>'4',
        ]);
        $response->assertStatus(400);
    }

    public function test_criarEstoqueErroValorNegativo()
    {
        $response = $this->post(route('criar.estoque'),[
        "produtos_id"=>'1',
        "pp"=>'-2',
        "p"=>'6',
        "m"=>'7',
        "g"=>'5',
        "gg"=>'4',
        ]);
        $response->assertStatus(400);
    }

    public function test_buscarEstoqueId()
    {
        $response = $this->get(route('buscar.estoqueId','2'));
        $response->assertStatus(200);
    }

    public function test_buscarEstoqueIdErroInexistente()
    {
        $response = $this->get(route('buscar.estoqueId','0'));
        $response->assertStatus(404);
    }

    public function test_atualizarEstoque()
    {
        $response = $this->put(route('atualizar.estoque','2'),[
            "pp"=>'2',
            "p"=>'6',
            "m"=>'7',
            "g"=>'5',
            "gg"=>'4',
            ]);
            $response->assertStatus(200);
    }

    public function test_atualizarEstoqueErroCaracter()
    {
        $response = $this->put(route('atualizar.estoque','2'),[
            "pp"=>'k',
            "p"=>'6',
            "m"=>'7',
            "g"=>'5',
            "gg"=>'4',
            ]);
            $response->assertStatus(400);
    }

    public function test_atualizarEstoqueErroValorNegativo()
    {
        $response = $this->put(route('atualizar.estoque','2'),[
            "pp"=>'-10',
            "p"=>'6',
            "m"=>'7',
            "g"=>'5',
            "gg"=>'4',
            ]);
            $response->assertStatus(400);
    }

    public function test_deletarEstoque()
    {
        $response = $this->delete(route('deletar.estoque','2'));
        $response->assertStatus(200);
    }

    public function test_deletarEstoqueErroInexistente()
    {
        $response = $this->delete(route('deletar.estoque','0'));
        $response->assertStatus(404);
    }

}