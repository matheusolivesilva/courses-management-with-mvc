<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Helper\HtmlRendererTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class InsertionForm implements RequestHandlerInterface 
{
    use HtmlRendererTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderHtml('courses/form.php', [
	    'title' => 'New Course'
	]);

	return new Response(200, [], $html);

    }
}
