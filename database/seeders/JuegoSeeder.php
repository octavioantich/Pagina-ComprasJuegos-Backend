<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Juego;
use App\Models\Desarrollador;


class JuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$this->call([
            JuegoSeeder::class,
        ]);*/

        Juego::factory(300)->create();
    }
}
