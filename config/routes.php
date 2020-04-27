<?php

use Alura\Courses\Controller\{InsertionForm, ListCourses,Persistence, Delete};

return [
    '/list-courses' => ListCourses::class,
    '/new-course' => InsertionForm::class,
    '/save-course' => Persistence::class,
    '/delete-course' => Delete::class
];

