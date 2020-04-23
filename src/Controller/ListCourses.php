<?php

namespace Alura\Courses\Controller;
use Alura\Courses\Entity\Course;
use Alura\Courses\Infra\EntityManagerCreator;
class ListCourses
{

    private $repositoryOfCourses;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositoryOfCourses = $entityManager->getRepository(Course::class);
    }

    public function processRequisition()
    {
        $courses = $this->repositoryOfCourses->findAll();
	?>

	<!DOCTYPE html>
	<html lang="en-us">
	<head>
	    <meta charset="utf-8">
	    <title>Document</title>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
	    <div class="jumbotron">
		<h1>List Courses</h1>
	    </div>
	    <a href="new-course" class="btn btn-primary mb-2">New Course</a>
	    <ul class="list-group">
		<?php foreach ($courses as $course): ?>
		    <li class="list-group-item">
			<?= $course->getDescription(); ?>
		    </li>
		<?php endforeach; ?>
	    </ul>
	</div>

	</body>
	</html>
        <?php
    }
}
