<?php

namespace Alura\Courses\Controller;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Response;
use Doctrine\ORM\EntityManagerInterface;
use Alura\Courses\Infra\EntityManagerCreator;
use Alura\Courses\Helper\FlashMessageTrait;
use Alura\Courses\Entity\Course;

class Delete implements RequestHandlerInterface
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
        $id = filter_var(
	    $request->getQueryParams()['id'],
	    FILTER_VALIDATE_INT);

	    $response = new Response(302, ['Location' => '/list-courses']);


	if ($id === false || is_null($id)) {
            $this->defineMessage('danger', 'This course does\'nt exists'); 
	    return $response;
	}

	$course = $this->entityManager->getReference(
	   Course::class, 
	   $id
        );

	$this->entityManager->remove($course);
        $this->entityManager->flush();
        $this->defineMessage('success', 'Course successfully deleted' ); 
        return $response;    
    }
}
