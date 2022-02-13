<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk_Model extends Model
{

    protected $table = 'produk';

    public function getProduk($id = false)
    {
        if ($id === false) {
            $this->join('kategori', 'produk.id_kategori = kategori.id', 'LEFT');
            $this->select('produk.id as id, produk.kode as kode, produk.nama_produk as nama_produk, produk.satuan as satuan, produk.harga as harga');
            $this->select('kategori.nama_kategori as nama_kategori');
            return $this->findAll();
        } else {
            $this->join('kategori', 'produk.id_kategori = kategori.id', 'LEFT');
            $this->select('produk.id as id, produk.kode as kode, produk.nama_produk as nama_produk, produk.satuan as satuan, produk.harga as harga');
            $this->select('kategori.nama_kategori as nama_kategori');
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
