<?php

namespace App\Http\Controllers;

use App\Service\AutenticacaoService;
use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function __construct(protected AutenticacaoService $autenticacaoService)
    {
    }

    public function login(Request $request)
    {
        $login=$request->only('email','password');
        return $this->autenticacaoService->login($login);
    }

    public function user (Request $request)
    {
        return $this->autenticacaoService->user($request);
    }
}