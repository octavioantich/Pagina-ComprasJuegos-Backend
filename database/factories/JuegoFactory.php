<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Desarrollador;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juego>
 */
class JuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'titulo' => $this->faker->numerify('Juego ####'),
        'descripcion' => $this->faker->paragraph(1),
        'imagenUrl' =>'https://res.cloudinary.com/do7sokks4/image/upload/v1687461512/juegos/goood_htpzg7.jpg',
        'precio' => $this->faker->randomFloat(2, 0, 100),
        'idDesarrollador' => Desarrollador::inRandomOrder()->first()->id,
        ];
    }
}
