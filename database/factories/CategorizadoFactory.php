<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categorizado;
use App\Models\Juego;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorizado>
 */
class CategorizadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idJuego' => Juego::inRandomOrder()->first()->id,
            'idCategoria' => Categoria::inRandomOrder()->pluck('id')->unique()->first()

        ];
    }
}
