<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Entity\Course;
use Alura\Courses\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistence implements RequestHandlerInterface 
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; 
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $description = filter_var(
            $request->getParsedBody()['description'],
            FILTER_SANITIZE_STRING
	);
        
	    $course = new Course();
	    $course->setDescription($description);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
	);

        $type = 'success';

        if (!is_null($id) && $id !== false) {
            $course->setId($id);
            $this->entityManager->merge($course);
            $this->defineMessage($type, 'Course successfully updated!' );
	} else {
            $this->entityManager->persist($course);
            $this->defineMessage($type, 'Course successfully inserted!' );
        }
        $this->entityManager->flush();

	return new Response(302, ['Location' => '/list-courses']);
    }

}
