<?php

namespace App\Service;

use App\Models\User;
use App\Repository\UsersRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UsersService
{
    public function __construct(protected UsersRepository $usersRepository)
    {
    }

    public function criarUsuario(User $novoUsuario)
    {
        return $this->usersRepository->criarUsuario($novoUsuario);
    }

    public function buscarUsuarioId(int $id)
    {
        return $this->usersRepository->buscarUsuarioId($id);
    }

    public function atualizarUsuario($dados, $id)
    {
        $usuario = $this->usersRepository->buscarUsuarioId($id);

        if (is_null($dados)) {
        return new JsonResponse("Usuario não encontrado.",Response::HTTP_NOT_FOUND);
        }
        $usuario->update([
                'nome'=>$dados->nome,
                'password'=>$dados->password, 
                ]);

        $this->usersRepository->atualizarUsuario($usuario);
        return new JsonResponse("Usuario atualizado.",Response::HTTP_ACCEPTED);
    }

    public function deletarUsuario(int $id)
    {
        return $this->usersRepository->deletarUsuario($id);
    }
}