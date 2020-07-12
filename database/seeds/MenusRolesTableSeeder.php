<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('menus_roles')->insert([
            [
                "menu_id" => '1',
                "rol_id" => '1',
            ],
            [
                "menu_id" => '2',
                "rol_id" => '1',
            ],
            [
                "menu_id" => '3',
                "rol_id" => '1',
            ],
            [
                "menu_id" => '4',
                "rol_id" => '1',
            ],
            
        ]);
    }
}
