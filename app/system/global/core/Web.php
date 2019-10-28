<?php
class Web
{

    protected $setController = [
        ['/', 'inicio'],
        ['/inicio', 'inicio'],
        /* --------- Add Controladores --------- */
        ['/login', 'login']
        /* ------------------------------------ */

    ];

    public function getController($controlador)
    {
        foreach ($this->setController as $control) {
            if (strtolower($controlador) == substr($control[0], 1)) {
                return $control[1];
                break;
            }
        }
    }
    
}
