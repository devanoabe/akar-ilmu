<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Jawabans')->insert([
            'user_id' => '1',
            'soal_id' => '1',
            'kartu_id' => '1',
            'inputJawaban' => 'Buaya'
        ]);
    }
}
