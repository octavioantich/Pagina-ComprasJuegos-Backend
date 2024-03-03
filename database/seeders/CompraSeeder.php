<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compra;
use App\Models\Usuario;
use App\Models\Juego;


class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$this->call([
            CompraSeeder::class,
        ]);*/

        Compra::factory(300)->create();
    }
}
