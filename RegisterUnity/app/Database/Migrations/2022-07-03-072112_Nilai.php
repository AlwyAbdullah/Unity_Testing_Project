<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nilai extends Migration
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
            'id_santri' => [
                'type'           => 'INT',
                'constraint'     => "4",
            ],
            'jenis_ujian' => [
                'type'           => 'VARCHAR',
                'constraint'     => "20"
            ],
            'nilai1' => [
                'type'           => 'INT',
                'constraint'     => "4"
            ],
            'nilai2' => [
                'type'           => 'INT',
                'constraint'     => "4"
            ],
            'nilai3' => [
                'type'           => 'INT',
                'constraint'     => "4"
            ],
            'nilai4' => [
                'type'           => 'INT',
                'constraint'     => "4"
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ]
        ]);

        $this->forge->addKey('id', true);

        // Membuat tabel news
        $this->forge->createTable('nilai', true);
    }

    public function down()
    {
        $this->forge->dropTable('nilai');
    }
}
