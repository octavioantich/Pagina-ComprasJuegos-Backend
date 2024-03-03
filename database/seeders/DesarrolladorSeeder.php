<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Desarrollador;


class DesarrolladorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /*$this->call([
            DesarrolladorSeeder::class,
        ]);*/

        Desarrollador::factory(60)->create();
    }

}
