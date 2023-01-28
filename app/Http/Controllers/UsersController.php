<?php

namespace App\Http\Controllers;

use App\Exceptions\UsersException;
use App\Models\User;
use App\Service\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function __construct(protected UsersService $usersService)
    {
    }

    public function criarUsuario(Request $request):JsonResponse
    {
        try {
            $usuario=new User($request->all());
            $this->usersService->criarUsuario($usuario);
            return new JsonResponse("Usuario Criado!",Response::HTTP_CREATED);
        } catch (UsersException $e) {
            return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function buscarUsuarioId(int $id)
    {
        return $this->usersService->buscarUsuarioId($id);
    }

    public function atualizarUsuario(Request $request,int $id)
    {
        try {
            $this->usersService->atualizarUsuario(new User($request->all()),$id);
            return new JsonResponse("Usuario Atualizado!",Response::HTTP_ACCEPTED);
        } catch (UsersException $e) {
            return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function deletarUsuario(int $id)
    {
        return $this->usersService->deletarUsuario($id);
    }

}
