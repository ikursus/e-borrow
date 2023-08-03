<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BahagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data 1 - Bahagian Pengurusan Maklumat
        DB::table('bahagian')->insert([
            'nama' => 'Bahagian Pengurusan Maklumat'
        ]);

        // Data 2 - Bahagian Pengurusan Sumber Manusia
        DB::table('bahagian')->insert([
            'nama' => 'Bahagian Pengurusan Sumber Manusia'
        ]);

        // Data 3 - Pejabat Menteri
        DB::table('bahagian')->insert([
            'nama' => 'Pejabat Menteri'
        ]);
    }
}
