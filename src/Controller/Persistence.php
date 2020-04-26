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
        $course = new Course();
	$course->setDescription($_POST['description']);
        $this->entityManager->persist($course);
	$this->entityManager->flush();
        
    }

}
