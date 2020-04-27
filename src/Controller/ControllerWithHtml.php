<?php

namespace Alura\Courses\Controller;

abstract class ControllerWithHtml
{
    public function renderHtml(string $templatePath, $data)
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../view/' . $templatePath;
        $html = ob_get_clean();

	return $html;
       
    }

}
