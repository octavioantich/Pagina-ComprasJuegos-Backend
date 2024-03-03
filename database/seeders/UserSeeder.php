<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdmin = new User;
        $userAdmin ->name = "admin";
        $userAdmin ->email = "admin@iaw.com";
        $userAdmin ->password =bcrypt("admin123");
        $userAdmin->userType = User::ADMIN_TYPE;
        $userAdmin ->save();

        $user = new User();
        $user->name = 'gameMaintenance';
        $user->email = 'gameMaintenance@iaw.com';
        $user->password = bcrypt('gameMaintenance123');
        $user->userType = User::GAMEMAINTENANCE_TYPE;
        $user->save();
    }
}
