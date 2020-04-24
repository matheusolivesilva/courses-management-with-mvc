<?php

namespace Alura\Courses\Controller;

class InsertionForm implements InterfaceRequestController
{
    public function processRequest(): void
    {
        require __DIR__ .'/../../view/courses/form.php';
    }
}
