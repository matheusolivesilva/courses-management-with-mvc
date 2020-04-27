<?php

namespace Alura\Courses\Controller;

class InsertionForm extends ControllerWithHtml implements InterfaceRequestController
{
    public function processRequest(): void
    {
        echo $this->renderHtml('courses/form.php', [
	    'title' => 'New Course'
	]);

    }
}
