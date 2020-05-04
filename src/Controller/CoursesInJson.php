<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CoursesInJson implements RequestHandlerInterface
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
     private $coursesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->coursesRepository = $entityManager
            ->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $courses = $this->coursesRepository->findAll();
	return new Response(
	    200,
	    ['Content-Type' => 'application/json'],
	    json_encode($courses)
	);
    }
}
