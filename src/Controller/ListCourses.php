<?php

namespace Alura\Courses\Controller;
use Alura\Courses\Entity\Course;
use Alura\Courses\Infra\EntityManagerCreator;
class ListCourses implements InterfaceRequestController
{

    private $repositoryOfCourses;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositoryOfCourses = $entityManager->getRepository(Course::class);
    }

    public function processRequest(): void
    {
        $courses = $this->repositoryOfCourses->findAll();
	require __DIR__ . '/../../view/courses/list-courses.php';
    }
}
