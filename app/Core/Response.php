<?php

namespace App\Core;

class Response
{
    public function setStatusConde(int $code)
    {
        http_response_code($code);
    }

    public function redirect($url)
    {
        header("Location: ".$url);
    }
}