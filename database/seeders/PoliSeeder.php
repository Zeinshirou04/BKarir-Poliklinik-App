<?php

namespace Database\Seeders;

use App\Models\Category\Poli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polis = [
            [
                'nama' => 'Gigi',
                'Deskripsi' => 'Poli gigi adalah layanan seputar kesehatan mulut dan gigi. Mulai dari pemeriksaan kesehatan, pembersihan, pengobatan, hingga tindakan medis.'
            ],
            [
                'nama' => 'Anak',
                'Deskripsi' => 'Poli anak adalah layanan kesehatan untuk anak sejak dia dilahirkan hingga berusia 18 tahun.'
            ],
            [
                'nama' => 'Penyakit Dalam',
                'Deskripsi' => 'Poli penyakit dalam adalah layanan kesehatan untuk masalah kesehatan yang terkait dengan organ dalam tubuh manusia.'
            ],
        ];

        Poli::insert($polis);
    }
}
