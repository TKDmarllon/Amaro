<?php

namespace App\Service;

use App\Models\User;
use App\Repository\UsersRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UsersService
{
    public function __construct(protected UsersRepository $usersRepository)
    {
    }

    public function criarUsuario(User $novoUsuario)
    {
        $novoUsuario->password = Hash::make($novoUsuario->password);
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
                'password'=> Hash::make($dados->password), 
                ]);

        $this->usersRepository->atualizarUsuario($usuario);
        return new JsonResponse("Usuario atualizado.",Response::HTTP_ACCEPTED);
    }

    public function deletarUsuario(int $id):JsonResponse
    {
        $exclusao=$this->usersRepository->buscarUsuarioId($id);

        if (is_null($exclusao)) {
            return new JsonResponse("Usuário não encontrado.",Response::HTTP_NOT_FOUND);
        }
            $this->usersRepository->deletarUsuario($id);
            return new JsonResponse("Usuário excluído.",Response::HTTP_OK);
    }
}