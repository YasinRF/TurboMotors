<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Coche;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Crear usuarios falsos
        User::factory(5)->create();

        // Crear un usuario específico
        User::create([
            'name' => 'Yasin',
            'email' => 'yasin@admin.com',
            'password' => Hash::make('password'),
            'rol' => 'ADMIN'
        ]);

        // Sembrar tipos de coches
        $this->call(TipoSeeder::class);

        // Sembrar marcas y modelos de coches
        $this->call(MarcaSeeder::class);

        // Storage::deleteDirectory('coches');
        // Storage::makeDirectory('coches');

        Coche::factory(20)->create();
    }
}
