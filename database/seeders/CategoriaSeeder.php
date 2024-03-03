<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria1 = new Categoria;
        $categoria1 ->nombre = "Accion";
        $categoria1 ->descripcion = "Categoria basada en juegos de accion";
        $categoria1 ->save();

        $categoria2 = new Categoria;
        $categoria2 ->nombre = "Casual";
        $categoria2 ->descripcion = "Categoria basada en juegos casuales";
        $categoria2 ->save();

        $categoria3 = new Categoria;
        $categoria3 ->nombre = "Deportes";
        $categoria3 ->descripcion = "Categoria basada en juegos de deportes como futbol, basquet, tennis...";
        $categoria3 ->save();

        $categoria4 = new Categoria;
        $categoria4 ->nombre = "Aventuras";
        $categoria4 ->descripcion = "Categoria basada en juegos de aventura";
        $categoria4 ->save();

        $categoria5 = new Categoria;
        $categoria5 ->nombre = "RPG";
        $categoria5 ->descripcion = "Categoria basada en juegos de rol";
        $categoria5 ->save();

        $categoria6 = new Categoria;
        $categoria6 ->nombre = "Simuladores";
        $categoria6 ->descripcion = "Categoria basada en juegos de simulacion";
        $categoria6 ->save();

        $categoria7 = new Categoria;
        $categoria7 ->nombre = "Terror";
        $categoria7 ->descripcion = "Categoria basada en juegos de terror y suspenso";
        $categoria7 ->save();

        $categoria8 = new Categoria;
        $categoria8 ->nombre = "Estrategia";
        $categoria8 ->descripcion = "Categoria basada en juegos de estrategia y gestion";
        $categoria8 ->save();
    }
}
