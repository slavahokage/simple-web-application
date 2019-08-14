<?php

namespace Core\Router;

use Core\Helpers\StringHelper;

class Request
{
    public function __construct()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{StringHelper::toCamelCase($key)} = $value;
        }

        foreach ($_REQUEST as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
