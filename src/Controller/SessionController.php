<?php

namespace App\Controller;

class SessionController extends Controller
{
    public function createSession()
    {
        session_start();
    }

    public function deleteSession()
    {
        session_destroy();
    }
}