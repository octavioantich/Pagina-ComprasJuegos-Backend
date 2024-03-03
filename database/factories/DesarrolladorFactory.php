<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Desarrollador>
 */
class DesarrolladorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->numerify('Desarrollador ###'),
            'descripcion' => $this->faker->sentence(),
            'pais' => $this->faker->country(),
        ];
    }
}
