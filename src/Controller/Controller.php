<?php

namespace App\Controller;

use Core\Router\Request;
use Twig\Environment;

class Controller
{
    protected $request;

    protected $twig;

    public function __construct(Request $request, Environment $twig)
    {
        $this->request = $request;
        $this->twig = $twig;
    }
}
