<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $users = [
            ['name' => 'Devano abe',
            'username' => 'Siswa1',
            'password' => bcrypt('123'),
            'email' => 'abe@gmail.com',
            'telepon' => '081339059398',
            'role' => '0'],
            ['name' => 'Rizky',
            'username' => 'Admin1',
            'password' => bcrypt('123'),
            'email' => 'rizky@gmail.com',
            'telepon' => '081339059922',
            'role' => '1'],
        ];
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}