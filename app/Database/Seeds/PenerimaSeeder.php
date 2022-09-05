<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PenerimaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'DIcky Chandra Kusuma',
                'alamat'    => 'Jl. Tentara Pelajar',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama' => 'DIan',
                'alamat'    => 'Jl. jogja',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama' => 'DIta',
                'alamat'    => 'Jl. kaligesing',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO penerima (nama, alamat) VALUES(:nama:, :alamat:)', $data);

        // Using Query Builder
        // $this->db->table('penerima')->insert($data);
        $this->db->table('penerima')->insertBatch($data);
    }
}
