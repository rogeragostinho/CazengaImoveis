<?php

namespace Database\Seeders;

use App\Models\TipoImovel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TipoImovel::factory(10)->create();
        TipoImovel::create(['nome' => 'casa']);
        TipoImovel::create(['nome' => 'apartamento']);
        TipoImovel::create(['nome' => 'terreno']);
        TipoImovel::create(['nome' => 'loja']);
        TipoImovel::create(['nome' => 'escritório']);
        TipoImovel::create(['nome' => 'restaurante']);
        TipoImovel::create(['nome' => 'hotel']);
        TipoImovel::create(['nome' => 'fábrica']);
        TipoImovel::create(['nome' => 'armazem']);
        TipoImovel::create(['nome' => 'galpão']);
        TipoImovel::create(['nome' => 'outro']);
    }
}
