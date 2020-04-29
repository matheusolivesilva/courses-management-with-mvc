<?php

namespace Alura\Courses\Controller;
use Alura\Courses\Entity\Course;
use Alura\Courses\Infra\EntityManagerCreator;
use Alura\Courses\Helper\HtmlRendererTrait;

class ListCourses implements InterfaceRequestController
{
    use HtmlRendererTrait;
    private $repositoryOfCourses;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositoryOfCourses = $entityManager->getRepository(Course::class);
    }

    public function processRequest(): void
    {
       echo $this->renderHtml('courses/list-courses.php', [
	    'courses' => $this->repositoryOfCourses->findAll(),
	    'title' => 'Courses'
	]);
    }
}
