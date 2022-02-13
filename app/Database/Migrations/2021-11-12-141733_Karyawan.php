<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'password'      => [
                'type'           => 'TEXT',
            ],
            'nik'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'no_hp'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'alamat' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'gaji'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'photo'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'role'      => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('karyawan', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
        $this->forge->dropTable('karyawan');
    }
}
