<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penerima extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penerima'        => [
                'type'          => 'INT',
                'constraint'    => 10,
                'auto_increment' => TRUE,
            ],
            'nama'      => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'alamat'    => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => TRUE,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => TRUE,
            ]
        ]);
        $this->forge->addKey('id_penerima', TRUE);
        $this->forge->createTable('penerima');
    }

    public function down()
    {
        $this->forge->dropTable('penerima');
    }
}
