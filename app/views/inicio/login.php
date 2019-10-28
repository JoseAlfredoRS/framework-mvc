<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?php URL::public_('css/login.css') ?>">
</head>

<body>
    <div class="materialContainer">

        <div class="box">
            <form action="<?php URL::route('login/signin') ?>" method="post" autocomplete="off">
                <div class="title">INICIAR SESIÓN</div>

                <div class="input">
                    <label for="name">Email</label>
                    <input type="text" name="name" id="name">
                    <span class="spin"></span>
                </div>

                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass">
                    <?php URL::csrf_Input(); ?>
                    <span class="spin"></span>
                </div>

                <div class="button login">
                    <button type=""><span>INICIAR</span> <i class="fa fa-check"></i></button>
                </div>

                <!-- <a href="" class="pass-forgot">Forgot your password?</a> -->
            </form>

        </div>

        <div class="overbox">
            <div class="material-button alt-2"><span class="shape"></span></div>

            <div class="title">REGISTRO</div>

            <div class="input">
                <label for="regname">Email</label>
                <input type="text" name="regname" id="regname">
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="regpass">Password</label>
                <input type="password" name="regpass" id="regpass">
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="reregpass">Repeat Password</label>
                <input type="password" name="reregpass" id="reregpass">
                <span class="spin"></span>
            </div>

            <div class="button">
                <button><span>SIGUIENTE</span></button>
            </div>

        </div>

    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php URL::public_('js/login.js') ?>"></script>
</body>

</html>