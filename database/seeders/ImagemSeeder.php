<?php

namespace Database\Seeders;

use App\Models\Imagem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Imagem::factory(30)->create();
        Imagem::create([
            'id_imovel' => 1,
            'url' => 'imoveis/1.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 2,
            'url' => 'imoveis/2.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 3,
            'url' => 'imoveis/3.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 4,
            'url' => 'imoveis/4.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 5,
            'url' => 'imoveis/5.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 6,
            'url' => 'imoveis/6.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 7,
            'url' => 'imoveis/7.jfif',
        ]);
        ///
        Imagem::create([
            'id_imovel' => 8,
            'url' => 'imoveis/1.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 9,
            'url' => 'imoveis/2.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 10,
            'url' => 'imoveis/3.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 11,
            'url' => 'imoveis/4.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 12,
            'url' => 'imoveis/5.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 13,
            'url' => 'imoveis/6.jfif',
        ]);
        Imagem::create([
            'id_imovel' => 14,
            'url' => 'imoveis/7.jfif',
        ]);
        
    }
}
