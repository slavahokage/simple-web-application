<?php

namespace App\Controller;

use Core\Router\Request;

class Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
