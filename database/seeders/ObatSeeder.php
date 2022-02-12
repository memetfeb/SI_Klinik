<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obat')->insert([
            'nama_obat' => 'Paracetamol',
            'biaya' => 12000
        ]);

        DB::table('obat')->insert([
            'nama_obat' => 'Calsium Lactate',
            'biaya' => 15000
        ]);
    }
}
