<?php

namespace App\Service;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AutenticacaoService
{

    public function login(array $login)
    {
        if (Auth::attempt($login)) {
            $user=Auth::user();
            $token=$user->createToken('Token');
            return new JsonResponse($token->plainTextToken, Response::HTTP_OK);    
        }

        return new JsonResponse('Usuário inválido',Response::HTTP_UNAUTHORIZED);
    }

    public function user ($dados)
    {
        $user= Auth::user();
        return $dados->user();
    }
}