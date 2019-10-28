<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php URL::title() ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-dark fixed-top">
        <a class="navbar-brand text-white">
            JLDeveloper - MVC
        </a>
        <form class="form-inline">
            <?php if (!Auth::state()) : ?>
                <a href="<?php URL::route('login'); ?>" class="btn btn-outline-success my-2 my-sm-0">Iniciar Sesion</a>
            <?php else : ?>
                <a href="<?php URL::route('login/logout'); ?>" class="btn btn-outline-danger my-2 my-sm-0">Cerrar Sesion</a>
            <?php endif; ?>
        </form>
    </nav>