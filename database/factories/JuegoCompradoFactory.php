<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JuegoComprado;
use App\Models\Juego;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JuegoComprado>
 */
class JuegoCompradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $var_idJuego = Juego::all()->random()->id;
        while($var_idJuego == null){
            $var_idJuego = Juego::all()->random()->id;
        }

        return [
            'idJuego' => $var_idJuego,
            'idCompra' => Compra::all()->random()->id,
            'precioDelMomento' => DB::table('juegos')->where('id', $var_idJuego)->value('precio')
        ];
    }
}
