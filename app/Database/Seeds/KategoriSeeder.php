<?php

namespace App\Database\Seeds;

class KategoriSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'kode'  => 'KT0001',
                'nama_kategori'  =>  'Cuci & Setrika',
                'gambar' => 'null',
                'aktif' => '1',
            ],
            [
                'kode'  => 'KT0002',
                'nama_kategori'  =>  'Setrika',
                'gambar' => 'null',
                'aktif' => '1',
            ],
            [
                'kode'  => 'KT0003',
                'nama_kategori'  =>  'Dry Cleaning',
                'gambar' => 'null',
                'aktif' => '1',
            ],
            [
                'kode'  => 'KT0004',
                'nama_kategori'  =>  'Cuci Premium',
                'gambar' => 'null',
                'aktif' => '1',
            ],
        ];
        $this->db->table('kategori')->insertBatch($data);
    }
}
