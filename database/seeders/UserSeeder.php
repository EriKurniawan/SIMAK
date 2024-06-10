<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nip' => '96428648611',
                'name' => 'Pimpinan',
                'username' => 'pimpinan',
                'jabatan' => 'Kepala Dinas',
                'email' => 'pimpinan@gmail.com',
                'level' => 'pimpinan',
                'password' => bcrypt('123456'),
                'foto' => 'user.png'
            ],
            [
                'nip' => '96428648600',
                'name' => 'Administrator',
                'username' => 'admin',
                'jabatan' => 'Admin',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => bcrypt('123456'),
                'foto' => 'user.png'
            ],
            [
                'nip' => '96428648642',
                'name' => 'Staf',
                'username' => 'staf',
                'jabatan' => 'Kepala Bidang',
                'email' => 'user@gmail.com',
                'level' => 'staf',
                'password' => bcrypt('123456'),
                'foto' => 'user.png'
            ],
            [
                'nip' => '9642864864200',
                'name' => 'Operator',
                'username' => 'operator',
                'jabatan' => 'Kasubag',
                'email' => 'operator@gmail.com',
                'level' => 'staf',
                'password' => bcrypt('123456'),
                'foto' => 'user.png'
            ]
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
