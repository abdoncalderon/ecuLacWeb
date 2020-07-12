<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('roles')->insert([
            [
                "nombre" => 'SUPERUSUARIO'
            ],
            [
                "nombre" => 'ADMINISTRADOR'
            ],
            [
                "nombre" => 'VENDEDOR'
            ],
            [
                "nombre" => 'REPARTIDOR'
            ],
            [
                "nombre" => 'CLIENTE',
                "esExterno"=>'1'
            ]
        ]);
    }
}
