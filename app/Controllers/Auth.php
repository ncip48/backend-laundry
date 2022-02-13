<?php

namespace App\Controllers;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['url', 'form']);
    }

    public function index()
    {
        $data['title'] = 'Login';
        if ($this->session->get('user')['role'] == '0') {
            return redirect()->to(base_url('admin'));
        }

        echo view('Template/Auth/auth_header', $data);
        echo view('Auth/login');
        echo view('Template/Auth/auth_footer');
    }

    public function logout()
    {
        $this->session->remove('user');
        return redirect()->to(base_url('auth'));
    }
}
