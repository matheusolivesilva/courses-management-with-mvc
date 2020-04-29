<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Infra\EntityManagerCreator;

use Alura\Courses\Entity\Course;

class Delete implements InterfaceRequestController
{
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
        $_SESSION['message_type'] = 'danger';
        $_SESSION['message'] = 'This course does\'nt exists';
        header('Location: /list-courses');
	    return;
	}

	$course = $this->entityManager->getReference(Course::class, $id);
	$this->entityManager->remove($course);
    $this->entityManager->flush();
    $_SESSION['message_type'] = 'success';
    $_SESSION['message'] = 'Course deleted successfully';
	header('Location: /list-courses');
    }
}
