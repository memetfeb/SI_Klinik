<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tindakan')->insert([
            'nama_tindakan' => 'Melakukan pengecekan Darah',
            'biaya' => 55000
        ]);

        DB::table('tindakan')->insert([
            'nama_tindakan' => 'Konsultasi Dokter',
            'biaya' => 40000
        ]);
    }
}
