<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('users')->insert([
            [
                "nombreCompleto" => 'Super Usuario',
                "cedula"=>'0000000000',
                "telefono"=>'0000000000',
                "email" => 'example@email.com',
                "usuario" => 'superusuario',
                "password" => Hash::make('Ecolac@2020'),
                "rol_id" => '1',
                "estaActivo" => '1',
            ],
            
        ]);
    }
}
