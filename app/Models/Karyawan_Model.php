<?php

namespace App\Models;

use CodeIgniter\Model;

class Karyawan_Model extends Model
{

    protected $table = 'karyawan';

    public function getKaryawan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }
    }

    public function addKaryawan($input)
    {
        helper(['function_helper']);
        $data = array_merge($input, array('password' => enkripsi_password($input['password'])));
        $this->db->table($this->table)->insert($data);
        return $this->db->insertId();
    }

    public function updateKaryawan($input, $id)
    {
        helper(['function_helper']);
        $data = array_merge($input, array('password' => enkripsi_password($input['password'])));
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteKaryawan($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
