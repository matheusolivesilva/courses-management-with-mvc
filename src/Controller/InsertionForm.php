<?php

namespace Alura\Courses\Controller;
use Alura\Courses\Helper\HtmlRendererTrait;

class InsertionForm implements InterfaceRequestController
{
    use HtmlRendererTrait;

    public function processRequest(): void
    {
        echo $this->renderHtml('courses/form.php', [
	    'title' => 'New Course'
	]);

    }
}
