<?php

namespace App\Repository;

use App\Models\User;

class UsersRepository
{
    public function salvarUsuario(User $dadosUsuario)
    {
        User::created($dadosUsuario);
    }

    public function consultaId(int $id)
    {
        User::findOrFail($id);
    }

    public function salvarAtualizacao(User $usuario)
    {
        User::saved($usuario);
    }

    public function destruirId(int $id)
    {
        User::destroy($id);
    }

}