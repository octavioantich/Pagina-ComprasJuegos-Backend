<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$this->call([
            UsuarioSeeder::class,
        ]);*/

        Usuario::factory(50)->create();

        $userTest = new Usuario;
        $userTest ->nombre = "test";
        $userTest ->email = "test@example.com";
        $userTest ->password =bcrypt("test123");
        $userTest ->save();
    }
}
