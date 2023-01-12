<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProdutosTest extends TestCase
{

    use WithoutMiddleware;
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_criarProduto()
    {
        $response = $this->post(route('criar.produto'),[
            "nome"=>"camisa de manga longa",
            "valor"=>'79',
	        "cor"=>"azul marinho",
            "genero"=>"m",
        ]);
        $response->assertStatus(201);
    }

        public function test_criarProdutoErroNomeFaltando()
    {
        $response = $this->post(route('criar.produto'),[
            "nome"=>"",
            "valor"=>'79',
	        "cor"=>"azul marinho",
            "genero"=>"m",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarProdutoErroValorFaltando()
    {
        $response = $this->post(route('criar.produto'),[
            "nome"=>"camisa de manga longa",
            "valor"=>'',
	        "cor"=>"azul marinho",
            "genero"=>"m",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarProdutoErroValorNegativo()
    {
        $response = $this->post(route('criar.produto'),[
            "nome"=>"camisa de manga longa",
            "valor"=>'-10',
	        "cor"=>"azul marinho",
            "genero"=>"m",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarProdutoErroCorFaltando()
    {
        $response = $this->post(route('criar.produto'),[
            "nome"=>"camisa de manga longa",
            "valor"=>'79',
	        "cor"=>"",
            "genero"=>"m",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarProdutoErroGeneroFaltando()
    {
        $response = $this->post(route('criar.produto'),[
            "nome"=>"camisa de manga longa",
            "valor"=>'79',
	        "cor"=>"azul marinho",
            "genero"=>"",
        ]);
        $response->assertStatus(400);
    }
        public function test_criarProdutoErroGeneroErrado()
    {
        $response = $this->post(route('criar.produto'),[
            "nome"=>"camisa de manga longa",
            "valor"=>'79',
	        "cor"=>"azul marinho",
            "genero"=>"k",
        ]);
        $response->assertStatus(400);
    }
}
