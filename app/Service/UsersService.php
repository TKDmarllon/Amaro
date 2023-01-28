<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UsersService
{
    public function __construct(protected $usersRepository)
    {
    }

    public function enviarCadastro(User $novoUsuario)
    {
        return $this->usersRepository->salvarUsuario($novoUsuario);
    }

    public function enviarBusca(int $id)
    {
        return $this->usersRepository->consultaId($id);
    }

    public function enviarNovosDados($dados, $id)
    {
        $usuario = $this->usersRepository->ConsultaId($id);

        if (is_null($dados)) {
        return new JsonResponse("Produto não encontrado.",Response::HTTP_NOT_FOUND);
        }
        $usuario->update([
                'nome'=>$dados->nome,
                'valor'=>$dados->password, 
                ]);

        $this->usersRepository->salvarAtualizacao($usuario);
        return new JsonResponse("Produto atualizado.",Response::HTTP_ACCEPTED);
    }

    public function enviarExclusao(int $id)
    {
        return $this->usersRepository->destruirId($id);
    }
}