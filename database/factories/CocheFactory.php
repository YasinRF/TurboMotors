<?php

namespace Database\Factories;

use App\Models\Deseo;
use App\Models\Marca;
use App\Models\Tipo;
use App\Models\User;
use App\Models\Vendido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coche>
 */
class CocheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));

        $nuevo = fake()->randomElement(['SI', 'NO']);

        return [
            'imagen' => 'coches/' . fake()->picsum('public/storage/coches', 640, 480, false),
            'descripcion' => fake()->text(),
            'color' => fake()->randomElement(['Negro', 'Blanco', 'Gris', 'Azul', 'Rojo', 'Amarillo']),
            'nuevo' => $nuevo,
            'kilometros' => $nuevo === 'SI' ? 0 : fake()->numberBetween(500, 100000),
            'precio' => fake()->numberBetween(1000, 100000),
            'fabricacion' => fake()->numberBetween(2000, 2024),
            'marca_id' => Marca::all()->random()->id,
            'tipo_id' => Tipo::inRandomOrder()->first()->id,
            'vendido_id' => Vendido::inRandomOrder()->first() ? Vendido::inRandomOrder()->first()->id : null,
            'deseo_id' => Deseo::inRandomOrder()->first() ? Deseo::inRandomOrder()->first()->id : null,
        ];
    }
}
