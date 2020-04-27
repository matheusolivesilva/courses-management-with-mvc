<?php

use Alura\Courses\Controller\{InsertionForm, ListCourses,Persistence, Delete, UpdateForm};

return [
    '/list-courses' => ListCourses::class,
    '/new-course' => InsertionForm::class,
    '/save-course' => Persistence::class,
    '/delete-course' => Delete::class,
    '/update-course' => UpdateForm::class
];

