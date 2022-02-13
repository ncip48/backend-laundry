<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['url', 'form', 'access_helper']);
    }

    public function index()
    {
    }

    public function dashboard()
    {
        $data['title'] = 'Admin - Dashboard';
        $data['menu'] = 'dashboard';
        $data['user'] = $this->session->get('user');
        echo view('Template/Admin/template', $data);
        echo view('Template/Admin/sidebar', $data);
        echo view('Template/Admin/header', $data);
        // echo view('Auth/login');
        echo view('Template/Admin/footer');
    }

    public function karyawan()
    {
        $data['title'] = 'Karyawan';
        $data['menu'] = 'karyawan';
        $data['user'] = $this->session->get('user');
        echo view('Template/Admin/template', $data);
        echo view('Template/Admin/sidebar', $data);
        echo view('Template/Admin/header', $data);
        echo view('Admin/karyawan', $data);
        echo view('Template/Admin/footer');

        //enkripsi-deskripsi
        // $config         = new \Config\Encryption();
        // $encrypter = \Config\Services::encrypter($config);
        // $ciphertext = base64_encode($encrypter->encrypt('karyawan123'));
        // echo $ciphertext;
        // $decrypts = base64_decode('RiMNL34fEDzJsu4zsJZgotoBkcXgLmRZRZ4XdaH8o0A6kRDfa0ofJe/n3zRyImNaPHD0Jb+UQmxDNmdhsLPUVi1ZaHIDjyOMurioGu3c4JYUuQRikc1gHw==');
        // $decrypt = $encrypter->decrypt($decrypts);
        // echo $decrypt;
    }

    public function produk()
    {
        $data['title'] = 'Produk';
        $data['menu'] = 'produk';
        $data['user'] = $this->session->get('user');
        echo view('Template/Admin/template', $data);
        echo view('Template/Admin/sidebar', $data);
        echo view('Template/Admin/header', $data);
        echo view('Admin/product', $data);
        echo view('Template/Admin/footer');
    }
}
