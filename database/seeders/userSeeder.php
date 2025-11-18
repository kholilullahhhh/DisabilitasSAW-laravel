<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    public function run(): void
    {
        $usr = [
            [
                'name' => 'BPS',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'Dinsos',
                'username' => 'user',
                'password' => bcrypt('user'),
                'role' => 'user',
            ],
        ];

        foreach ($usr as $v) {
            User::create([
                'name' => $v['name'],
                'username' => $v['username'],
                'password' => $v['password'],
                'role' => $v['role'],
            ]);
        };
    }
}
