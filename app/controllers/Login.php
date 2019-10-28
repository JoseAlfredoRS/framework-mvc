<?php

class Login extends Controller
{

    public function __construct()
    {
        $this->session = new Session;
        $this->session->init();
    }

    public function index()
    {
        TestRequest('GET');
        if (!$this->session->exists('AUTH') || empty($this->session->get('AUTH'))) {
            $this->vista('inicio.login');
        } else {
            $this->redirect('/');
        };
    }

    public function signin()
    {
        TestRequest('POST');
        $this->session->add('AUTH', TRUE);
        $this->session->add('ROLS', ['']);
        $this->redirect('/');
    }

    public function logout()
    {
        TestRequest('GET');
        $this->session->close();
        $this->redirect('/');
    }
}
