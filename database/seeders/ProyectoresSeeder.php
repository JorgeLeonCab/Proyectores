<?php

namespace Database\Seeders;

use App\Models\Proyectores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyectores::create([
            'name' => "Proyector de prueba 1",
            "numero_serie" => "123ABC"
        ]);
        Proyectores::create([
            'name' => "Proyector de prueba 2",
            "numero_serie" => "ABC321"
        ]);
        Proyectores::create([
            'name' => "Proyector de prueba 3",
            "numero_serie" => "456QED"
        ]);
    }
}
