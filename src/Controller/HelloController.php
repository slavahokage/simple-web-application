<?php

namespace App\Controller;

class HelloController extends Controller
{
    public function helloXss()
    {
        $name = $this->request->name ?? 'User';

        return "<h1>Hello my friend, $name</h1>";
    }
}