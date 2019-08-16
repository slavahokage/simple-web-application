<?php

namespace Core\Helpers;

final class StringHelper
{
    public static function toCamelCase($string)
    {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);
        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }

    public static function startsWith($string, $startString)
    {
        $len = strlen($startString);

        return (substr($string, 0, $len) === $startString);
    }
}
