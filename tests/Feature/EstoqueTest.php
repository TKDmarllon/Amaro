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
        $response = $this->get(route('buscar.estoqueId','1'));
        $response->assertStatus(200);
    }
}