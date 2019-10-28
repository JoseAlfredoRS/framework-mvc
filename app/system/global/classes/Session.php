<?php

class Session
{
    /**
     * Inicializa la sesión
     */
    public function init()
    {
        session_start();
    }

    /**
     * Agrega un elemento a la sesión
     * @param string $key la llave del array de sesión
     * @param string $value el valor para el elemento de la sesión
     */
    public function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Retorna un elemento a la sesión
     * @param string $key la llave del array de sesión
     * @return string el valor del array de sesión si tiene valor
     */
    public function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Verigica si una sesion existe
     * @param string $key la llave del array de sesión
     * @return boolean respuesta de la session
     */
    public function exists($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }

    /**
     * Retorna todos los valores del array de sesión
     * @return el array de sesión completo
     */
    public function getAll()
    {
        return $_SESSION;
    }

    /**
     * Remueve un elemento de la sesión
     * @param string $key la llave del array de sesión
     */
    public function remove($key)
    {
        if (!empty($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    /**
     * Finaliza la sesión actual y almacena la información de la sesión. 
     */
    public function close_save()
    {
        session_write_close();
    }

    /**
     * Cierra la sesión eliminando los valores
     */
    public function close()
    {
        session_unset();
        session_destroy();
    }

    /**
     * Retorna el estatus de la sesión
     * @return string el estatus de la sesión
     */
    public function getStatus()
    {
        return session_status();
    }
}
