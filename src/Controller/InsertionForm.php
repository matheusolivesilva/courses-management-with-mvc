<?php

namespace Alura\Courses\Controller;

class InsertionForm implements InterfaceRequestController
{
    public function processRequest(): void
    {
	$title = 'New Course';
        require __DIR__ .'/../../view/courses/form.php';
    }
}
