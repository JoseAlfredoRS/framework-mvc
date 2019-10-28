<?php
class Controller
{

    public function model($modelo)
    {
        $modelo = ucwords($modelo) . '_Model';
        if (file_exists(RUTA_APP . '/models/' . $modelo . '.php')) {
            require_once RUTA_APP . '/models/' . $modelo . '.php';
            return new $modelo();
        } else {
            die('EL MODELO NO EXISTE');
        }
    }

    public function vista($vista, $datos = [])
    {
        if ($this->request('ajax')) {
            header('HTTP/1.1 400 Bad Request');
            die('ERROR 400 : SOLICITUD INCORRECTA');
        }
        $vista = str_replace('.', '/', $vista);
        if (file_exists(RUTA_APP . '/views/' . $vista . '.php')) {
            is_array($datos) ? extract($datos) : die('ERROR AL ENVIAR DATOS A LA VISTA.');
            require_once RUTA_APP . '/views/' . $vista . '.php';
            exit;
        } else {
            die('LA VISTA NO EXISTE');
        }
    }

    public function jsonResponse($response)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: applicaton/json; charset=UTF-8");
        http_response_code(200);
        echo json_encode($response);
        exit;
    }

    public function redirect($pagina = '/')
    {
        $pagina = (substr($pagina, 0, 1) == '/') ? RUTA_URL . $pagina : $pagina;
        if (!headers_sent()) {
            header("HTTP/1.1 302 Moved Temporarily");
            header('Location: ' . $pagina);
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $pagina . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content=0; url=' . $pagina . '"/>';
            echo '</noscript>';
            exit;
        }
    }

    public function load($folder = 'libs', $routeFile = null)
    {
        if (file_exists(RUTA_APP . '/system/' . $folder . '/' . $routeFile . '.php')) {
            require_once RUTA_APP . '/system/' . $folder . '/' . $routeFile . '.php';
        } else {
            die('EL ARCHIVO NO EXISTE');
        }
    }

    public function request($type = 'ajax')
    {
        $type = strtolower($type);
        switch ($type) {
            case 'ajax':
                return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false;
                break;
            default:
                return false;
                break;
        }
    }
}
