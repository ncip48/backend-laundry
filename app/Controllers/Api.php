<?php

namespace App\Controllers;

use App\Models\Auth_Model;
use App\Models\Karyawan_Model;
use App\Models\Produk_Model;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Exception;

class Api extends ResourceController
{
    protected $format       = 'json';
    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }

    //global function
    public function format_respond($success, $data = null, $error = null)
    {
        $error = [
            'success' => $success,
            'error' => $error,
            'data' => $data
        ];
        return $this->respond($error, 200);
    }

    //untuk login
    public function login()
    {
        $validation =  \Config\Services::validation();
        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);
        $authModel = new Auth_Model();
        $input = $this->request->getJSON(true);

        if ($this->request->getMethod() != 'post') {
            return $this->format_respond(false, null, 'Dilarang!!!');
        }
        if ($validation->run($input, 'login') == FALSE) {
            return $this->format_respond(false, null, $validation->getErrors());
        } else {
            $user = $authModel->login($input);
            if ($user) {
                $decrypt = $encrypter->decrypt(base64_decode($user['password']));
                if ($input['password'] == $decrypt) {
                    $key = getenv('TOKEN_SECRET');
                    $iat = time();
                    $exp = $iat + 86400;
                    $payload = array(
                        "iat" => $iat,
                        "exp" => $exp,
                        "uid" => $user['id'],
                        "email" => $user['email']
                    );
                    $token = JWT::encode($payload, $key);
                    $data = array_merge($user, array('token' => $token));
                    if ($input['type'] == 'web') {
                        $this->session->set('user', $data);
                        // return redirect()->to(base_url('admin/dashboard'));
                    }
                    return $this->format_respond(true, $data);
                } else {
                    return $this->format_respond(false, null, ['result' => 'Password salah']);
                }
            } else {
                return $this->format_respond(false, null, ['result' => 'User tidak ditemukan']);
            }
        }
    }

    //karyawan
    public function get_karyawan()
    {
        $karyawanModel = new Karyawan_Model();
        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {
                $user = $karyawanModel->getKaryawan();
                if ($user) {
                    return $this->format_respond(true, $user);
                } else {
                    return $this->format_respond(false, null, ['result' => 'Karyawan tidak ada']);
                }
            } else {
                return $this->format_respond(false, null, 'Server Error!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }

    public function tambah_karyawan()
    {
        $karyawanModel = new Karyawan_Model();
        $validation =  \Config\Services::validation();
        $input = $this->request->getJSON(true);

        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {
                if ($validation->run($input, 'karyawan') == FALSE) {
                    return $this->format_respond(false, null, $validation->getErrors());
                } else {
                    $simpan = $karyawanModel->addKaryawan($input);
                    if ($simpan) {
                        $data = $karyawanModel->getKaryawan($simpan);
                        return $this->format_respond(true, $data, null);
                    }
                }
            } else {
                return $this->format_respond(false, null, 'Server Errors!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }

    public function update_karyawan($id = NULL)
    {
        $karyawanModel = new Karyawan_Model();
        $input = $this->request->getJSON(true);

        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {
                $simpan = $karyawanModel->updateKaryawan($input, $id);
                if ($simpan) {
                    $data = $karyawanModel->getKaryawan($id);
                    return $this->format_respond(true, $data);
                }
            } else {
                return $this->format_respond(false, null, 'Server Errors!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }

    public function delete_karyawan($id = NULL)
    {
        $karyawanModel = new Karyawan_Model();

        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {

                $delete = $karyawanModel->deleteKaryawan($id);
                if ($delete) {
                    return $this->format_respond(true, $id);
                }
            } else {
                return $this->format_respond(false, null, 'Server Errors!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }

    //produk
    public function get_produk()
    {
        $produkModel = new Produk_Model();
        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {
                $user = $produkModel->getProduk();
                if ($user) {
                    return $this->format_respond(true, $user);
                } else {
                    return $this->format_respond(false, null, ['result' => 'Produk tidak ada']);
                }
            } else {
                return $this->format_respond(false, null, 'Server Error!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }

    public function tambah_produk()
    {
        $produkModel = new Produk_Model();
        $validation =  \Config\Services::validation();
        $input = $this->request->getJSON(true);

        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {
                if ($validation->run($input, 'produk') == FALSE) {
                    return $this->format_respond(false, null, $validation->getErrors());
                } else {
                    $simpan = $produkModel->addProduk($input);
                    if ($simpan) {
                        $data = $produkModel->getProduk($simpan);
                        return $this->format_respond(true, $data, null);
                    }
                }
            } else {
                return $this->format_respond(false, null, 'Server Errors!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }

    public function update_produk($id = NULL)
    {
        $produkModel = new Produk_Model();
        $input = $this->request->getJSON(true);

        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {
                $simpan = $produkModel->updateProduk($input, $id);
                if ($simpan) {
                    $data = $produkModel->getProduk($id);
                    return $this->format_respond(true, $data);
                }
            } else {
                return $this->format_respond(false, null, 'Server Errors!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }

    public function delete_produk($id = NULL)
    {
        $produkModel = new Produk_Model();

        //jwt
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->format_respond(false, null, 'Akses Ditolak!!');
        $token = explode(' ', $header)[1];
        try {
            $key = getenv('TOKEN_SECRET');
            $decoded = JWT::decode($token, $key, array("HS256"));
            if ($decoded) {

                $delete = $produkModel->deleteProduk($id);
                if ($delete) {
                    return $this->format_respond(true, $id);
                }
            } else {
                return $this->format_respond(false, null, 'Server Errors!!');
            }
        } catch (Exception $ex) {
            return $this->format_respond(false, null, 'Server Error!!' . $ex->getMessage());
        }
    }
}
