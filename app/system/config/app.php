<?php

/* CONFIGURACION BASE DE DATOS */
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'rootroot');
DEFINE('DB_NAME', 'eurekabank');


/* CONFIGURACION APLICACION */
DEFINE('RUTA_URL', 'http://framework-mvc.test:8084');
DEFINE('HOSTING_', $_SERVER['HTTP_HOST']);
DEFINE('RUTA_APP', DIRNAME(DIRNAME(DIRNAME(__FILE__))));


/* CONFIGURACION SITIO WEB */
DEFINE('NOMBRE_SITIO', 'PHP MVC');
DEFINE('ERROR_REPORTING_LEVEL', -1);


/* CONFIGURACION ENCRYPT */
DEFINE('METHOD', 'AES-256-CBC');
DEFINE('SECRET_KEY', '$ALFREDO&JOSE@' . DATE("Ymd"));
DEFINE('SECRET_IV', '101712');


/* CONFIGURACION ZONA HORARIA */
DATE_DEFAULT_TIMEZONE_SET('America/Lima');
DEFINE('TIMESTAMP', DATE("Y-m-d H:i:s"));
