<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TryoutSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('tryouts')->insert([
            'user_id' => '1',
            'mata_pelajaran_id' => '1',
            'namaTryout' => 'Tryout UNBK',
            'detailTryout' => 'Persiapan UNBK',
        ]);
    }
}