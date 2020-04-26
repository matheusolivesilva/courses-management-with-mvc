<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Entity\Course;

use Alura\Courses\Infra\EntityManagerCreator;

class Persistence implements InterfaceRequestController
{

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;
    
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processRequest(): void
    {
        $description = filter_input(
	    INPUT_POST,
	    'description',
	    FILTER_SANITIZE_STRING);
        $course = new Course();
	$course->setDescription($description);
        $this->entityManager->persist($course);
	$this->entityManager->flush();
        header('Location: /list-courses', true, 302); 
    }

}
