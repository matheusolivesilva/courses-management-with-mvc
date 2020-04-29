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

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            $course->setId($id);
            $this->entityManager->merge($course);
            $_SESSION['message'] = 'Course successfully updated!';
	    } else {
            $this->entityManager->persist($course);
            $_SESSION['message'] = 'Course suscessfully inserted';
	    }
        $_SESSION['message_type'] = 'success';
        $this->entityManager->flush();
        header('Location: /list-courses', true, 302); 
    }

}
