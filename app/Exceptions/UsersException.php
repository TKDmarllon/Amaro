<?php

namespace App\Exceptions;

use Exception;

class UsersException extends Exception
{
    public function __construct($mensage, $code)
    {
        $this->message = $mensage;
        $this->code = $code;
    }
}
