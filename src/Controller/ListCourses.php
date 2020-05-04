<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Entity\Course;
use Alura\Courses\Helper\HtmlRendererTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListCourses implements RequestHandlerInterface 
{
    use HtmlRendererTrait;
    
    private $coursesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->coursesRepository = $entityManager
	    ->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
       $html = $this->renderHtml('courses/list-courses.php', [
	    'courses' => $this->coursesRepository->findAll(),
	    'title' => 'Courses'
	]);

	return new Response(200, [], $html);
    }
}
