<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ahmad Albab',
            'email' => 'ahmadalbab@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'telefon' => '0123456789',
            'bahagian_id' => 1,
            'jawatan' => 'Pegawai Teknologi Maklumat'
        ]);

        DB::table('users')->insert([
            'name' => 'Upin',
            'email' => 'upin@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'telefon' => '0123456789',
            'bahagian_id' => 2,
            'jawatan' => 'Pegawai Teknologi Maklumat'
        ]);

        DB::table('users')->insert([
            'name' => 'Siti',
            'email' => 'siti@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'telefon' => '0123456789',
            'bahagian_id' => 3,
            'jawatan' => 'Pegawai Teknologi Maklumat'
        ]);
    }
}
