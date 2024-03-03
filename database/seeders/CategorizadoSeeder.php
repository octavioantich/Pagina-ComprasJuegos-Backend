<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorizado;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class CategorizadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        for ($idJuego = 1; $idJuego <= 300; $idJuego++) {
            $arrayIdCategoria = [];
            $cantCategoriasDistintas = rand(1, 8);
            for ($j = 0; $j < $cantCategoriasDistintas; $j++) {
                $idCategoria = $faker->numberBetween(1, 8);
                while (in_array($idCategoria, $arrayIdCategoria)) {
                    $idCategoria = $faker->numberBetween(1, 8);
                }
                $arrayIdCategoria[] = $idCategoria;
                DB::table('categorizados')->insert([
                    'idJuego' => $idJuego,
                    'idCategoria' => $idCategoria,
                ]);
            }
        }

    }
}
