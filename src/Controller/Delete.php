<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Infra\EntityManagerCreator;
use Alura\Courses\Helper\FlashMessageTrait;
use Alura\Courses\Entity\Course;

class Delete implements InterfaceRequestController
{
    use FlashMessageTrait;

    /**
     * @var EntityManagerCreator
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
	    ->getEntityManager();
    }

    public function processRequest(): void
    {
        $id = filter_input(INPUT_GET,
	    'id',
	    FILTER_VALIDATE_INT);

	if ($id === false || is_null($id)) {
        $this->defineMessage('danger', 'This course does\'nt exists'); 
        header('Location: /list-courses');
	    return;
	}

	$course = $this->entityManager->getReference(Course::class, $id);
	$this->entityManager->remove($course);
    $this->entityManager->flush();
    $this->defineMessage('success', 'Course successfully deleted' ); 
    header('Location: /list-courses');
    }
}
