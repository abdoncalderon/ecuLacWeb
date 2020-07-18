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
                "nombre" => 'SUPERUSUARIO',
                "esExterno"=>'0'
            ],
            [
                "nombre" => 'ADMINISTRADOR',
                "esExterno"=>'0'
            ],
            [
                "nombre" => 'VENDEDOR',
                "esExterno"=>'0'
            ],
            [
                "nombre" => 'REPARTIDOR',
                "esExterno"=>'0'
            ],
            [
                "nombre" => 'CLIENTE',
                "esExterno"=>'1'
            ]
        ]);
    }
}
