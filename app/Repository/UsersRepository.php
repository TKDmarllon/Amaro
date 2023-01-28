<?php

namespace App\Repository;

use App\Models\User;

class UsersRepository
{
    public function criarUsuario(User $dadosUsuario)
    {
        User::created($dadosUsuario);
    }

    public function buscarUsuarioId(int $id)
    {
        User::findOrFail($id);
    }

    public function atualizarUsuario(User $usuario)
    {
        User::saved($usuario);
    }

    public function deletarUsuario(int $id)
    {
        User::destroy($id);
    }

}