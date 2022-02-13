<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
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
            'nama_produk'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'satuan'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'harga'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('produk', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
