<?php

class Inicio extends Controller
{

    public function __construct()
    {
        // Auth::session();
        $this->pm = $this->model('Prueba');
    }

    public function index()
    {
        TestRequest('GET');
        $sucursales = DB::query('SELECT * FROM sucursal');
        if ($this->request('ajax')) {
            return $this->jsonResponse($sucursales);
        }
        return $this->vista('inicio.welcome', compact('sucursales'));
    }

    public function listadoAjax()
    {
        TestAjax();
        $sucursales = $this->pm->getSucursal();
        return $this->jsonResponse($sucursales);
    }
}
