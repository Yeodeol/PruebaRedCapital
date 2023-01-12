<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = new User();
        $users->nombre = 'Admin';
        $users->apellido = 'Admin';
        $users->edad = 29;
        $users->email = 'admin@correo.com';
        $users->password = Hash::make('123qweasd');
        $users->admin = 1;
        $users->save();

        $producto1 = new Producto();
        $producto1->sku = 'sku001';
        $producto1->nombre = 'producto1';
        $producto1->precio_unitario = 20000;
        $producto1->save();

        $producto2 = new Producto();
        $producto2->sku = 'sku002';
        $producto2->nombre = 'producto2';
        $producto2->precio_unitario = 50000;
        $producto2->save();
        
        $producto3 = new Producto();
        $producto3->sku = 'sku003';
        $producto3->nombre = 'producto3';
        $producto3->precio_unitario = 5000;
        $producto3->save();
        
    }
}
