<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php if (isset($_SESSION['logged'])) : ?>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/list-courses">Home</a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/logout">Exit</a>
	</li>
    </ul>
</nav>
<?php endif; ?>
<div class="container">
    <div class="jumbotron">
        <h1><?= $title; ?></h1>
    </div>
