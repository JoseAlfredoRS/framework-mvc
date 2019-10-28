<?php

function encryption($string)
{
    $output = false;
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

function decryption($string)
{
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
    return $output;
}

function TestRequest($method = 'GET')
{
    $method = strtoupper($method);
    if ($_SERVER['HTTP_HOST'] === HOSTING_) {
        if ($_SERVER['REQUEST_METHOD'] === $method) {
            return true;
        } else if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        } else {
            header('HTTP/1.1 400 Bad Request');
            $controller = new Controller;
            $controller->vista('errors/400');
            exit;
        }
    } else {
        exit;
    }
}

function TestAjax()
{
    if ($_SERVER['HTTP_HOST'] === HOSTING_) {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        } else {
            header('HTTP/1.1 400 Bad Request');
            $controller = new Controller;
            $controller->vista('errors/400');
            exit;
        }
    } else {
        exit;
    }
}

function debug_array($miarray, $die = false)
{
    echo "<pre> ";
    print_r($miarray);
    echo "</pre> ";
    if ($die) die();
}


// function Parameters($numArg = 0)
// {
//     $ruta = ($this->getUrl());
//     unset($ruta[0]);
//     unset($ruta[1]);
//     $parametros = array_values($ruta);
//     $parametros = count($parametros);
//     if ($numArg != $parametros) {
//         $this->vista('404/index');
//         exit();
//     }
// }

// function clearString($cadena)
// {
//     $cadena = trim($cadena);
//     $cadena = strip_tags($cadena);
//     $cadena = stripslashes($cadena);
//     $cadena = str_ireplace("<script>", "", $cadena);
//     $cadena = str_ireplace("</script>", "", $cadena);
//     $cadena = str_ireplace("<script src>", "", $cadena);
//     $cadena = str_ireplace("<script type=>", "", $cadena);
//     $cadena = str_ireplace("SELECT * FROM", "", $cadena);
//     $cadena = str_ireplace("DELETE FROM", "", $cadena);
//     $cadena = str_ireplace("INSERT INTO", "", $cadena);
//     $cadena = str_ireplace("SELECT", "", $cadena);
//     $cadena = str_ireplace("--", "", $cadena);
//     $cadena = str_ireplace("^", "", $cadena);
//     $cadena = str_ireplace("{", "", $cadena);
//     $cadena = str_ireplace("}", "", $cadena);
//     $cadena = str_ireplace("'", "", $cadena);
//     $cadena = str_ireplace("[", "", $cadena);
//     $cadena = str_ireplace("]", "", $cadena);
//     $cadena = str_ireplace("<", "", $cadena);
//     $cadena = str_ireplace(">", "", $cadena);
//     $cadena = str_ireplace("=", "", $cadena);
//     $cadena = str_ireplace("==", "", $cadena);
//     return $cadena;
// }

// function generateRandomCode($letra, $longitud, $num)
// {
//     for ($i = 1; $i <= $longitud; $i++) {
//         $numero = rand(0, 9);
//         $letra .= $numero;
//     }
//     return $letra . '-' . $num;
// }

// function generateRandomString($length = 10)
// {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $charactersLength = strlen($characters);
//     $randomString = '';
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString;
// }

// function CalculaEdad($fecha)
// {
//     list($Y, $m, $d) = explode("-", $fecha);
//     return (date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y);
// }

// function fechaCastellano($fecha, $mostrar = null)
// {
//     $fecha = substr($fecha, 0, 10);
//     $numeroDia = date('d', strtotime($fecha));
//     $dia = date('l', strtotime($fecha));
//     $mes = date('F', strtotime($fecha));
//     $anio = date('Y', strtotime($fecha));
//     $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
//     $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
//     $nombredia = str_replace($dias_EN, $dias_ES, $dia);
//     $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
//     $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
//     $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
//     switch ($mostrar) {
//         case 'dia':
//             return $nombredia;
//             break;
//         case 'mes':
//             return $nombreMes;
//             break;
//         default:
//             return $nombredia . " " . $numeroDia . " de " . $nombreMes . " del " . $anio;
//             break;
//     }
// }

// function cortarFrase($frase, $maxPalabras = 3, $noTerminales = ["de"])
// {
//     $palabras = explode(" ", $frase);
//     $numPalabras = count($palabras);
//     if ($numPalabras > $maxPalabras) {
//         $offset = $maxPalabras - 1;
//         while (in_array($palabras[$offset], $noTerminales) && $offset < $numPalabras) {
//             $offset++;
//         }
//         return implode(" ", array_slice($palabras, 0, $offset + 1));
//     }
//     return $frase;
// }

// function hourdiff($inicio, $fin, $formated = false)
// {
//     $ts1 = strtotime($inicio);
//     $ts2 = strtotime($fin);
//     $seconds_diff = $ts2 - $ts1;
//     switch ($formated) {
//         case false:
//             $time = ($seconds_diff / 3600);
//             return round($time, 2);
//             break;
//         default:
//             $horas = floor($seconds_diff / 3600);
//             $minutos = floor(($seconds_diff - ($horas * 3600)) / 60);
//             $segundos = $seconds_diff - ($horas * 3600) - ($minutos * 60);
//             $horas = str_pad($horas, 2, "0", STR_PAD_LEFT);
//             $minutos = str_pad($minutos, 2, "0", STR_PAD_LEFT);
//             $segundos = str_pad($segundos, 2, "0", STR_PAD_LEFT);
//             return $horas . ':' . $minutos . ":" . $segundos;
//             break;
//     }
// }

// function dateDifference($date_1, $date_2, $differenceFormat = '%a')
// {
//     $datetime1 = date_create($date_1);
//     $datetime2 = date_create($date_2);
//     $interval = $datetime1->diff($datetime2);
//     return $interval->format($differenceFormat);
// }

// function url_completa($forwarded_host = false)
// {
//     $ssl   = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
//     $proto = strtolower($_SERVER['SERVER_PROTOCOL']);
//     $proto = substr($proto, 0, strpos($proto, '/')) . ($ssl ? 's' : '');
//     if ($forwarded_host && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
//         $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
//     } else {
//         if (isset($_SERVER['HTTP_HOST'])) {
//             $host = $_SERVER['HTTP_HOST'];
//         } else {
//             $port = $_SERVER['SERVER_PORT'];
//             $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
//             $host = $_SERVER['SERVER_NAME'] . $port;
//         }
//     }
//     $request = $_SERVER['REQUEST_URI'];
//     return $proto . '://' . $host . $request;
// }
