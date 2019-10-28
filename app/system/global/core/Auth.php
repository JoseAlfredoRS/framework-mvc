<?php
class Auth
{
    public static function login()
    {
        $session = new Session;
        if (!isset($_SESSION))
            $session->init();
        if (!$session->exists('AUTH') || empty($session->get('AUTH'))) {
            $controller = new Controller;
            $controller->redirect('/login');
            exit;
        }
    }

    public static function session($rols = null)
    {
        $session = new Session;
        if (!isset($_SESSION))
            $session->init();
        if (!$session->exists('AUTH') || empty($session->get('AUTH'))) {
            header('HTTP/1.1 403 Forbidden');
            $controller = new Controller;
            $controller->vista('errors/403');
            exit;
        }
    }

    public static function state()
    {
        $session = new Session;
        if (!isset($_SESSION))
            $session->init();
        return (!$session->exists('AUTH') || empty($session->get('AUTH'))) ? false : true;
    }
}
