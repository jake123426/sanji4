<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class categoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['nombre' => 'coche',],
            ['nombre' => 'moto',],
            ['nombre' => 'motor',],
            ['nombre' => 'deporte',],
            ['nombre' => 'inmoviliaria',],
            ['nombre' => 'moviles',],
            ['nombre' => 'servicios',],
            ['nombre' => 'otros',],


        ];

        foreach ($items as $item) {
            Categoria::create($item);
        }
    }
}
