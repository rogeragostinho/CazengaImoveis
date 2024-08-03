<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contato>
 */
class ContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id_usuario' => User::pluck('id')->random(),
            'telefone1' => '92'.fake()->randomNumber(7),
            'telefone2' => '9'.fake()->randomNumber(8),
            'whatsapp' => '95'.$this->faker->randomNumber(7),
        ];
    }
}
