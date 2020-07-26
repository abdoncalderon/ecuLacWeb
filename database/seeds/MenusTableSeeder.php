<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('menus')->insert([
            
            [
                "nombre" => 'content.provinces',
                "ruta"  => 'provincias.index',
                "icono" => 'provincias.png',
            ],
            [
                "nombre" => 'content.cities',
                "ruta"  => 'ciudades.index',
                "icono" => 'ciudades.png',
            ],
            [
                "nombre" => 'content.offices',
                "ruta"  => 'sucursales.index',
                "icono" => 'sucursales.png',
            ],
            [
                "nombre" => 'content.categories',
                "ruta"  => 'categorias.index',
                "icono" => 'categorias.png',
            ],
            [
                "nombre" => 'content.types',
                "ruta"  => 'tipos.index',
                "icono" => 'tipos.png',
            ],
            [
                "nombre" => 'content.presentations',
                "ruta"  => 'presentaciones.index',
                "icono" => 'presentaciones.png',
            ],
            [
                "nombre" => 'content.products',
                "ruta"  => 'productos.index',
                "icono" => 'productos.png',
            ],
            [
                "nombre" => 'content.roles',
                "ruta"  => 'roles.index',
                "icono" => 'roles.png',
            ],    
            [
                "nombre" => 'content.menus',
                "ruta"  => 'menus.index',
                "icono" => 'menus.png',
            ],     
            [
                "nombre" => 'content.users',
                "ruta"  => 'usuarios.index',
                "icono" => 'usuarios.png',
            ],
            [
                "nombre" => 'content.orders',
                "ruta"  => 'pedidos.vendedor',
                "icono" => 'pedidos.png',
            ],
            [
                "nombre" => 'content.deliveries',
                "ruta"  => 'pedidos.repartidor',
                "icono" => 'entregas.png',
            ],
            [
                "nombre" => 'content.reports',
                "ruta"  => 'reportes.index',
                "icono" => 'reportes.png',
            ],
            
        ]);
    }
}
