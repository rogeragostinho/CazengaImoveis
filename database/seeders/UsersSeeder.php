<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'tipo' => 'admin',
            'name' => 'Roger',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'tipo' => 'intermediario',
            'name' => 'Admin',
            'email' => 'joao@example.com',
            'password' => bcrypt('joao'),
        ]);
    }
}
