<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'kode_buku' => 'BKN01',
            'judul' => 'Belajar Database',
            'pengarang' => 'Muhammad Ega Rama Fernanda',
            'jenis_buku' => 'Buku Umum',
            'harga' => 102000,
            'qty' => 50,
        ],
        [
            'kode_buku' => 'BKN02',
            'judul' => 'Belajar Membaca',
            'pengarang' => 'Yunus Abadi',
            'jenis_buku' => 'Buku Umum',
            'harga' => 110000,
            'qty' => 60,
        ],
        [
            'kode_buku' => 'BKN03',
            'judul' => 'Dari Langit ke Bumi',
            'pengarang' => 'Ferdina Malika',
            'jenis_buku' => 'Novel',
            'harga' => 75000,
            'qty' => 40,
        ]
        ];
        DB::table('data')->insert($data);
    }
}
