<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JuegoComprado;

class JuegoCompradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$this->call([
            JuegoCompradoSeeder::class,
        ]);*/

        JuegoComprado::factory(1032)->create();
    }
}
