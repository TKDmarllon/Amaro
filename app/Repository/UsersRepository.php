<?php

namespace App\Repository;

use App\Models\User;

class UsersRepository
{
    public function criarUsuario(User $dadosUsuario)
    {
        return User::create($dadosUsuario->getAttributes());
    }

    public function buscarUsuarioId(int $id)
    {
        return User::findOrFail($id);
    }

    public function atualizarUsuario(User $usuario)
    {
        return User::saved($usuario);
    }

    public function deletarUsuario(int $id)
    {
        User::destroy($id);
    }

}