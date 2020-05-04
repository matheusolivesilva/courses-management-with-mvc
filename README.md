# Courses Manager With MVC

This project written with MVC is a CRUD of courses management. It was developed as a part of PHP formation at [Alura](https://alura.com.br).

## Features

This system has some features, such as:
* Login and logout
* Capability to create, list, update and delete a course
* It has two webservices, that provide courses in XML and JSON format (see searchCoursesInJson and searchCoursesInXml routes)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites
To run this system in your local machine, you must to have installed:

* PHP 7 or greater
* Doctrine ORM
* Remember to enable in your php.ini: extension=php\_pdo\_sqlite

### Installing

Installing this system it's pretty easy, just follow the step by step bellow:

1. First of all, clone or download this repo
2. Go to project directory and run the system with ````php -S localhost:yourporthere/ -t public ```` 
3. At http://localhost:yourporthere/login, use the following credentials: "matheus.oliveira.silv@gmail.com" for email and for password use "123456"

## Built With

This simple system was written with the techniques and tecnologies below:

* PHP 7
* SQLite 
* Doctrine ORM
* MVC architecture
* Some concepts of gitflow
* VIM as editor

## Versioning

We use [SemVer](http://semver.org/) for versioning.  

## Authors

* **Matheus Oliveira** - [Github](https://github.com/MatheusOliveiraSilva/) | [Linkedin](https://www.linkedin.com/in/matheusoliveirasilva/)
