<?php

namespace App\Database\Seeds;

class ProdukSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'kode'  => 'LDR1010',
                'nama_produk'  =>  'Laundry Kiloan',
                'satuan' => 'KG',
                'harga' => '6000',
            ],
            [
                'kode'  => 'LDR1020',
                'nama_produk'  =>  'Laundry Helm',
                'satuan' => 'Unit',
                'harga' => '10000',
            ],
            [
                'kode'  => 'LDR1030',
                'nama_produk'  =>  'Laundry Selimut',
                'satuan' => 'Unit',
                'harga' => '15000',
            ],
        ];
        $this->db->table('produk')->insertBatch($data);
    }
}
