<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KartuSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kartusoals')->insert([
            'idsoals' =>'1',
            'Jawaban' =>'hendi'
        ]);
    }
}
