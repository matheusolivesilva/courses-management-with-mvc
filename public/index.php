<?php

switch($_SERVER['PATH_INFO']) {
    case '/list-courses':
        require 'list-courses.php';
	break;
    case '/new-course':
        require 'new-course-form.php';
	break;
    default:
        echo "Error 404";
}

