<?php

namespace Core\Router;

use Core\Helpers\StringHelper;

class Request
{
    public function __construct()
    {
        header("X-XSS-Protection: 0");

        foreach ($_SERVER as $key => $value) {
            $this->{StringHelper::toCamelCase($key)} = $value;
        }

        foreach ($_REQUEST as $key => $value) {
            $this->{$key} = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
    }
}
