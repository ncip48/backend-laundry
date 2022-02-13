<?php

namespace App\Database\Seeds;

class ProdukSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'kode'  => 'LDR1010',
                'id_kategori' => '1',
                'nama_produk'  =>  'Laundry Kiloan',
                'satuan' => 'KG',
                'harga' => '6000',
            ],
            [
                'kode'  => 'LDR1020',
                'id_kategori' => '1',
                'nama_produk'  =>  'Laundry Helm',
                'satuan' => 'Unit',
                'harga' => '10000',
            ],
            [
                'kode'  => 'LDR1030',
                'id_kategori' => '2',
                'nama_produk'  =>  'Laundry Selimut',
                'satuan' => 'Unit',
                'harga' => '15000',
            ],
        ];
        $this->db->table('produk')->insertBatch($data);
    }
}
