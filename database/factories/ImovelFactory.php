<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TipoImovel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imovel>
 */
class ImovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
        /*return [
            'estado' => 'ativo',
            'contrato' => fake()->firstName(),
            'tipo' => fake()->firstName(),
            'bairro' => fake()->firstName(),
            'rua' => fake()->firstName(),
            'casa_n' => fake()->firstName(),
            'outro_localizacao' => fake()->firstName(),
            'dimensao' => fake()->randomNumber(3).'x'.fake()->randomNumber(3),
            'descricao' => fake()->text(200),
            'nDeQuartos' => fake()->randomNumber(2),
            'preco' => fake()->randomFloat(2, 5000, 1000000),
            'nomeResponsavel' => fake()->firstName(),
            'telefone1'=> fake()->randomNumber(9),
            'telefone2'=> fake()->randomNumber(9),
            'whatsapp'=> fake()->randomNumber(9),
        ];*/
    }
}
