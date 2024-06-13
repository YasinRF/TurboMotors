<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'Urbano',
            'Deportivo',
            'Familiar',
            'SUV',
            'Todoterreno',
            'Descapotable',
            'Pick-up'
        ];

        foreach ($tipos as $tipo) {
            Tipo::create(['nombre' => $tipo]);
        }
    }
}
