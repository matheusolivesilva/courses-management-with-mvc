<?php

use Alura\Courses\Controller\{InsertionForm, ListCourses,Persistence, Delete, UpdateForm, LoginForm, DoLogin, Logout, CoursesInJson, CoursesInXml};

return [
    '/list-courses' => ListCourses::class,
    '/new-course' => InsertionForm::class,
    '/save-course' => Persistence::class,
    '/delete-course' => Delete::class,
    '/update-course' => UpdateForm::class,
    '/login' => LoginForm::class,
    '/sign-in' => DoLogin::class,
    '/logout' => Logout::class,
    '/searchCoursesInJson' => CoursesInJson::class,
    '/searchCoursesInXml' => CoursesInXml::class
];

