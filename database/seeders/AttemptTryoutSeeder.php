<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttemptTryoutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('attempttryouts')->insert([
            'user_id' => '1',
            'tryout_id' => '1',
        ]);
    }
}
