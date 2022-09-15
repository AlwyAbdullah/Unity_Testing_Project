<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengajar extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_pengajar'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'kelas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => "20",
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

        // Membuat primary key
        $this->forge->addKey('id', true);

        // Membuat tabel news
        $this->forge->createTable('pengajar', true);
    }

    //-------------------------------------------------------

    public function down()
    {
        // menghapus tabel news
        $this->forge->dropTable('pengajar');
    }
}
