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

    public function test_bucarProduto()
    {
        $response = $this->get(route('buscar.produtoId',3));
        $response->assertStatus(200);
    }

    public function test_bucarProdutoErroIdInexistente()
    {
        $response = $this->get(route('buscar.produtoId',0));
        $response->assertStatus(404);
    }

    public function test_buscarSku()
    {
        $response = $this->get(route('buscar.sku','0087265'));
        $response->assertStatus(200);
    }

    public function test_buscarSkuErroInexistente()
    {
        $response = $this->get(route('buscar.sku','00000000'));
        $response->assertStatus(404);
    }

    public function test_buscarNome()
    {
        $response=$this->get(route('buscar.nome','TESTE casaco'));
        $response->assertStatus(200);
    }

    public function test_buscarNomeErroInexistente()
    {
        $response=$this->get(route('buscar.nome','Cabuçu'));
        $response->assertStatus(404);
    }

    public function test_atualizarProduto()
    {
        $response=$this->put(route('atualizar.produto','1'),[
            "nome"=>"TESTE atualização",
            "valor"=>'100',
	        "cor"=>"verde escuro",
            "genero"=>"f"
        ]);
        $response->assertStatus(202);
    }
        public function test_atualizarProdutoErroValorNegativo()
    {
        $response=$this->put(route('atualizar.produto','1'),[
            "nome"=>"TESTE atualização",
            "valor"=>'-10',
	        "cor"=>"azul marinho",
            "genero"=>"m",
        ]);
        $response->assertStatus(400);
    }

    public function test_atualizarProdutoErroGeneroErrado()
    {
        $response = $this->put(route('atualizar.produto','1'),[
            "nome"=>"TESTE atualização",
            "valor"=>'79',
	        "cor"=>"azul marinho",
            "genero"=>'k',
        ]);
        $response->assertStatus(400);
    }

    public function test_deletarProduto()
    {
        $response=$this->delete(route('deletar.produto','1'));
        $response->assertStatus(200);
    }

    public function test_deletarProdutoErroInexistente()
    {
        $response=$this->delete(route('deletar.produto','0'));
        $response->assertStatus(404);
    }
}
