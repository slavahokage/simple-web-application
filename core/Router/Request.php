<?php

namespace Core\Router;

use Core\Helpers\StringHelper;

final class Request
{
    public function __construct()
    {
        header("X-XSS-Protection: 0");

        foreach ($_SERVER as $key => $value) {
            $this->{StringHelper::toCamelCase($key)} = $value;
        }

        foreach ($_COOKIE as $key => $value) {
            $this->{"cookie"}[StringHelper::toCamelCase($key)] = $value;
        }

        foreach ($_REQUEST as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $item) {
                    $this->{$key}[] = htmlspecialchars($item, ENT_QUOTES, 'UTF-8');
                }
            } else {
                $this->{$key} = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }
    }


    public function deleteCookie($key)
    {
        unset($_COOKIE[$key]);
        setcookie($key, '', time() - 3600);

    }
}
