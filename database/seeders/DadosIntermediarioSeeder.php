<?php

namespace Database\Seeders;

use App\Models\DadosIntermediario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DadosIntermediarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DadosIntermediario::factory(2)->create();
    }
}
