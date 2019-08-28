<?php

use function DI\create;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return [
    \Core\Router\Request::class => create(\Core\Router\Request::class),

    Environment::class => function () {
        $loader = new FilesystemLoader(__DIR__ . '/../src/View');
        $twig = new Environment($loader);

        return $twig;
    },
];
