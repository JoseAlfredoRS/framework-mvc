<?php

class Errors extends Controller
{
    public function __construct()
    {
        // Auth::session();
    }

    public function index()
    {
        header('HTTP/1.1 404 Not Found');
        return $this->vista('errors.404');
    }
}
