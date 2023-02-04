<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest extends TestCase
{

##### REFATORAR TUDO PR FUNCIONAR NAS ROTAS DE USUARIO ########

    use WithoutMiddleware;
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_criarUsuario()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"usuario teste um",
            "email"=>'usuariroteste@teste.com',
	        "password"=>"123456Ab",
            "password_confirmation"=>"123456Ab",
        ]);
        $response->assertStatus(201);
    }

        public function test_criarUsuarioErroNomeFaltando()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"",
            "email"=>'usuariroteste@teste.com',
	        "password"=>"123456Ab",
            "password_confirmation"=>"123456Ab",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarUsuarioErroEmailFaltando()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"usuario teste um",
            "email"=>'',
	        "password"=>"123456Ab",
            "password_confirmation"=>"123456Ab",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarUsuarioErroEmailErrado()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"usuario teste um",
            "email"=>'emailerrado.com',
	        "password"=>"123456Ab",
            "password_confirmation"=>"123456Ab",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarUsuarioErroPasswordFaltando()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"usuario teste um",
            "email"=>'usuariroteste@teste.com',
	        "password"=>"",
            "password_confirmation"=>"123456Ab",
        ]);
        $response->assertStatus(400);
    }

        public function test_criarUsuarioErroConfirmacaoPasswordFaltando()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"usuario teste um",
            "email"=>'usuariroteste@teste.com',
	        "password"=>"123456Ab",
            "password_confirmation"=>"",
        ]);
        $response->assertStatus(400);
    }
        public function test_criarUsuarioErroPasswordPoucosDigitos()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"usuario teste um",
            "email"=>'usuariroteste@teste.com',
	        "password"=>"123456",
            "password_confirmation"=>"123456",
        ]);
        $response->assertStatus(400);
    }

    public function test_criarUsuarioErroPasswordFaltandoCaracteres()
    {
        $response = $this->post(route('criar.usuario'),[
            "nome"=>"usuario teste um",
            "email"=>'usuariroteste@teste.com',
	        "password"=>"majoeijq",
            "password_confirmation"=>"majoeijq",
        ]);
        $response->assertStatus(400);
    }

    public function test_buscarUsuario()
    {
        $response = $this->get(route('buscar.usuarioId','1'));
        $response->assertStatus(200);
    }

    public function test_buscarUsUarioErroIdInexistente()
    {
        $response = $this->get(route('buscar.usuarioId',0));
        $response->assertStatus(404);
    }

    public function test_atualizarUsuario()
    {
        $response=$this->put(route('atualizar.usuario','1'),[
            "nome"=>"usuario atualizado",
            "email"=>'usuariroteste@teste.com',
	        "password"=>"123456Ab",
            "password_confirmation"=>"123456Ab",
        ]);
        $response->assertStatus(202);
    }
        public function test_atualizarUsuarioErroNomeGigante()
    {
        $response=$this->put(route('atualizar.usuario','1'),[
            "nome"=>"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
        ]);
        $response->assertStatus(400);
    }

    public function test_atualizarUsuarioErroPasswordFaltando()
    {
        $response = $this->put(route('atualizar.usuario','1'),[
            "password"=>'',
            "passoword_confirmation"=>'123456Ab'
        ]);
        $response->assertStatus(500);
    }

    public function test_atualizarUsuarioErroConfirmacaoPasswordFaltando()
    {
        $response = $this->put(route('atualizar.usuario','1'),[
            "password"=>'123456Ab',
            "passoword_confirmation"=>''
        ]);
        $response->assertStatus(400);
    }

    public function test_atualizarUsuarioErroPasswordPoucosDigitos()
    {
        $response = $this->put(route('atualizar.usuario','1'),[
            "password"=>'123456',
            "passoword_confirmation"=>'123456'
        ]);
        $response->assertStatus(400);
    }

    public function test_atualizarUsuarioErroPasswordFaltandoCaracteres()
    {
        $response = $this->put(route('atualizar.usuario','1'),[
            "password"=>'12345678',
            "passoword_confirmation"=>'12345678'
        ]);
        $response->assertStatus(400);
    }

    public function test_deletarUsuario()
    {
        $response=$this->delete(route('deletar.usuario',1));
        $response->assertStatus(200);
    }

    public function test_deletarUsuarioErroInexistente()
    {
        $response=$this->delete(route('deletar.usuario','0'));
        $response->assertStatus(404);
    }
}
