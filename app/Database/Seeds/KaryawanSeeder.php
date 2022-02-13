<?php

namespace App\Database\Seeds;

class KaryawanSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        helper(['function']);
        $data = [
            [
                'email'  => 'admin@gmail.com',
                'password'  =>  enkripsi_password('admin123'),
                'nik' => '3521091505990002',
                'nama' => 'Administrator',
                'no_hp' => '085156842765',
                'alamat' => 'Jl. Trunojoyo utara no 6, Ngawi',
                'gaji' => '9999999',
                'role' => 0
            ],
            [
                'email'  => 'karyawan1@gmail.com',
                'password'  =>  enkripsi_password('karyawan123'),
                'nik' => '3521091505990002',
                'nama' => 'Karyawan A',
                'no_hp' => '080888080887',
                'alamat' => 'Jl. Gak tau',
                'gaji' => '2500000',
                'role' => 1
            ],
            [
                'email'  => 'karyawan2@gmail.com',
                'password'  =>  enkripsi_password('karyawan123'),
                'nik' => '3521091505990002',
                'nama' => 'Karyawan B',
                'no_hp' => '080888080887',
                'alamat' => 'Jl. Gak tau',
                'gaji' => '3000000',
                'role' => 1
            ],
            [
                'email'  => 'karyawan3@gmail.com',
                'password'  =>  enkripsi_password('karyawan123'),
                'nik' => '3521091505990002',
                'nama' => 'Karyawan C',
                'no_hp' => '080888080887',
                'alamat' => 'Jl. Gak tau',
                'gaji' => '1500000',
                'role' => 1
            ]
        ];
        $this->db->table('karyawan')->insertBatch($data);
    }
}
