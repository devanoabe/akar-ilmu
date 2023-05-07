<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('soals')->insert([
            'tryout_id' => '1',
            'jenis_soal_id' => '1',
            'induk_soal_id' => '1',
            'detailSoal' => 'Uraian'
        ]);
    }
}
