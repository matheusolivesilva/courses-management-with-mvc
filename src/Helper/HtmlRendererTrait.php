<?php

namespace Alura\Courses\Helper;

trait HtmlRendererTrait
{
    public function renderHtml(string $templatePath, array $data): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../view/' . $templatePath;
        $html = ob_get_clean();

	return $html;
       
    }

}
