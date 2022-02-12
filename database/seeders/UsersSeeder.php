<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ZuperAdmin',
            'email' => 'ZuperAdmin@kliniktadikamesra.com',
            'role' => 'superadmin',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Joko D. Roger',
            'email' => 'joko@kliniktadikamesra.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
    }
}
