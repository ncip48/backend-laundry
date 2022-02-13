<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth_Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session()->get('user');
        if (!session()->get('user')) {
            return redirect()->to(base_url('auth'));
        }
        if ($session['role'] == 1) {
            return redirect()->to(base_url('karyawan'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
