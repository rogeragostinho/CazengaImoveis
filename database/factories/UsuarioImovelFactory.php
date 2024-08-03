<?php

namespace Database\Factories;

use App\Models\Imovel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario_Imovel>
 */
class UsuarioImovelFactory extends Factory
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
            'id_imovel' => Imovel::pluck('id')->random()
        ];
    }
}
