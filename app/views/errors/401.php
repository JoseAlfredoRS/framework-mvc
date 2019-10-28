<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php URL::title() ?></title>
</head>

<?php URL::include_('errors.partials.style') ?>

<body>

    <div class="error-page">
        <div>
            <!--h1(data-h1='400') 400-->
            <!--p(data-p='BAD REQUEST') BAD REQUEST-->
            <!--h1(data-h1='401') 401-->
            <!--p(data-p='UNAUTHORIZED') UNAUTHORIZED-->
            <!--h1(data-h1='403') 403-->
            <!--p(data-p='FORBIDDEN') FORBIDDEN-->
            <h1 data-h1="401">401</h1>
            <p data-p="UNAUTHORIZED">NO AUTORIZADO</p>
            <!--h1(data-h1='500') 500-->
            <!--p(data-p='SERVER ERROR') SERVER ERROR-->
        </div>
    </div>
    <div id="particles-js"></div>

</body>

</html>