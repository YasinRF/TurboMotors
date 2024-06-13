<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            'Mercedes' => ["SLC", "AMG", "GLC"],
            'Audi' => ["A1", "A4", "Q8", "R8"],
            'Renault' => ["Megane", "Twingo", "Clio", "Trafic"],
            'Kia' => ["Carens", "Ceed", "Picanto"],
            'Bmw' => ["Serie 1", "Serie 5", "X6"],
            'Ford' => ["Focus", "Fiesta", "Mustang"],
            'Mazda' => ["3", "MX-5"],
            'Jeep' => ["Wrangler", "Compass"],
            'Porsche' => ["911", "Macan"],
            'Ferrari' => ["458"],
            'Citroen' => ["C3", "Berlingo"],
            'Mitsubishi' => ["ASX", "L200"],
            'Seat' => ["León", "Ibiza"],
            'Peugeot' => ["208", "Traveller"],
            'Opel' => ["Corsa", "Cabrio"],
            'Nissan' => ["Juke", "GT-R"],
            'Fiat' => ["500"],
            'Jaguar' => ["XE"],
            'Toyota' => ["Supra", "Corolla"],
            'Mini' => ["Cooper"],
        ];

        foreach ($marcas as $nombre => $modelos) {
            foreach ($modelos as $modelo) {
                Marca::create(['nombre' => $nombre, 'modelo' => $modelo]);
            }
        }
    }
}
