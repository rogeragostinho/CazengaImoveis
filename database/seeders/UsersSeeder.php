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
            'email' => 'b@gmail.com',
            'password' => bcrypt('b'),
        ]);
        User::create([
            'tipo' => 'intermediario',
            'name' => 'Admin',
            'email' => 'joao@gmail.com',
            'password' => bcrypt('joao'),
        ]);
    }
}
