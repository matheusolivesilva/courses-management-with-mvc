<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Courses\Controller\ListCourses;
use Alura\Courses\Controller\InsertionForm;

switch($_SERVER['PATH_INFO']) {
    case '/list-courses':
        $controller = new ListCourses();
	$controller->processRequest();
	break;
    case '/new-course':
        $controller = new InsertionForm();
	$controller->processRequest();
	break;
    default:
        echo "Error 404";
}

