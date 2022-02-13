<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
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
            'kode'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nama_kategori'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'gambar'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'aktif'      => [
                'type'           => 'INT',
                'constraint'     => '1',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('kategori', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
