<?php

namespace App\Http\Controllers;

use App\Exceptions\UsersException;
use App\Http\Requests\AtualizacaoUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Service\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function __construct(private UsersService $usersService)
    {
    }

    public function criarUsuario(UserRequest $request):JsonResponse
    {
        try {
            $user=new User($request->all());
            $this->usersService->criarUsuario($user);
            return new JsonResponse("Usuario Criado!",Response::HTTP_CREATED);
        } catch (UsersException $e) {
            return new JsonResponse($e->getMessage(),$e->getCode());
        }
    }

    public function buscarUsuarioId(int $id)
    {
        return $this->usersService->buscarUsuarioId($id);
    }

    public function atualizarUsuario(AtualizacaoUserRequest $request,int $id)
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
