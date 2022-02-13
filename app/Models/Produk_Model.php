<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk_Model extends Model
{

    protected $table = 'produk';

    public function getProduk($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }
    }

    public function addProduk($input)
    {
        helper(['function_helper']);
        $data = array_merge($input, array('kode' => random_kode_produk()));
        $this->db->table($this->table)->insert($data);
        return $this->db->insertId();
    }

    public function updateProduk($input, $id)
    {
        return $this->db->table($this->table)->update($input, ['id' => $id]);
    }

    public function deleteProduk($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
