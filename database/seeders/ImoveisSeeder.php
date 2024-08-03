<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imovel;

class ImoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Imovel::factory(30)->create();

        Imovel::create([
            'contrato' => 'venda',
            'tipo' => 'casa',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '478945000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'venda',
            'tipo' => 'apartamento',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '89234000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'venda',
            'tipo' => 'terreno',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '8999000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'venda',
            'tipo' => 'armazem',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '123535999',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'venda',
            'tipo' => 'casa',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '546600999',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'venda',
            'tipo' => 'apartamento',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '45654000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'venda',
            'tipo' => 'terreno',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '1546000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        ////
        Imovel::create([
            'contrato' => 'aluguel',
            'tipo' => 'casa',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '478000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'aluguel',
            'tipo' => 'apartamento',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '765000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'aluguel',
            'tipo' => 'terreno',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '120000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'aluguel',
            'tipo' => 'armazem',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '435999',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'aluguel',
            'tipo' => 'casa',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '1600999',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'aluguel',
            'tipo' => 'apartamento',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '654000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
        Imovel::create([
            'contrato' => 'aluguel',
            'tipo' => 'terreno',
            'bairro' => 'Hoji ya henda',
            'rua' => 'Comandante valódia',
            'preco' => '70000',
            'dono_nome' => 'João',
            'dono_telefone' => '912345678',
            'status' => 'ativo',
            'user_id' => 1
        ]);
    }
}
