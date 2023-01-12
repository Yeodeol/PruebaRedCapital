<?php

namespace Database\Seeders;

use App\Models\Cotizacion_c;
use App\Models\Cotizacion_d;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Respaldo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = Producto::all();
        $records2 = User::all();
        $records3 = Cotizacion_c::all();
        $records4 = Cotizacion_d::all();
    }
}
