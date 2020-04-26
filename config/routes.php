<?php

use Alura\Courses\Controller\InsertionForm;
use Alura\Courses\Controller\ListCourses;
use Alura\Courses\Controller\Persistence;

$routes = [
    '/list-courses' => ListCourses::class,
    '/new-course' => InsertionForm::class,
    '/save-course' => Persistence::class
];

return $routes;
