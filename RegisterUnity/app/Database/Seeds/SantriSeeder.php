<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SantriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => "Alwy",
                'Kelas'         => "5",
                'jenis_ujian'   => "Mustawayat 1",
                'nilai1'        => 60,
                'nilai2'        => 90,
                'nilai3'        => 70,
                'nilai4'        => 80,
                'created_at'    => Time::now()
            ],
            [
                'nama'          => "Hasyim",
                'Kelas'         => "2",
                'jenis_ujian'   => "UTS",
                'nilai1'        => 80,
                'nilai2'        => 100,
                'nilai3'        => 80,
                'nilai4'        => 90,
                'created_at'    => Time::now()
            ],
            [
                'nama'          => "Suyono",
                'Kelas'         => "Private",
                'jenis_ujian'   => "Mustawayat 3",
                'nilai1'        => 50,
                'nilai2'        => 30,
                'nilai3'        => 100,
                'nilai4'        => 50,
                'created_at'    => Time::now()
            ]
        ];
        $this->db->table('santri')->insertBatch($data);
    }
}
