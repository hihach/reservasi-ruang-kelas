<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lantai;

class LantaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lantai::create([
            'nama' => 'AdminSira',
            'nim' => '00000000',
            'username' => 'superadmin',
        'password' => Hash::make('password'),
            'email' => 'admin@campus.ac.id',
            'role' => 'admin',

        ]);
    }
}
