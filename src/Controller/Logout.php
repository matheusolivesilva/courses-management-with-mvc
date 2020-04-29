<?php

namespace Alura\Courses\Controller;

class Logout implements InterfaceRequestController
{
    public function processRequest(): void
    {
        session_destroy();
        header('Location: /login');
    }
}