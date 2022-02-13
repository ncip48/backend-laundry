<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_Model extends Model
{

    protected $table = 'karyawan';

    public function login($input)
    {
        $email = $input['email'];
        $password = $input['password'];
        return $this->getWhere(['email' => $email])->getRowArray();
    }
}
