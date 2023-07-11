<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       /*  User::factory(10)->create(); */

        $this->call([RoleSeeder::class]);

        User::create([
            "name" => "Oscar Gonzalez",
            "email" => "oscar@mail.com",
            "password" => Hash::make("admin")
        ])->assignRole("admin");

        User::create([
            "name" => "Javi Alonso",
            "email" => "maestro@maestro.com",
            "password" => Hash::make("maestro")
        ])->assignRole("maestro");

        User::create([
            "name" => "Jared Borgeti",
            "email" => "alumno@alumno.com",
            "password" => Hash::make("alumno")
        ])->assignRole("alumno");
    }
}
