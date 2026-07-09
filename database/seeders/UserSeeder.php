<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lantai;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'AdminSira',
            'nim' => '00000000',
            'username' => 'superadmin',
            'password' => Hash::make('password'),
            'email' => 'admin@campus.ac.id',
            'role' => 'admin',

        ]);
    }
}
