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
                "nombre" => 'content.products',
                "icono" => 'cheese',
            ],
            [
                "nombre" => 'content.users',
                "icono" => 'user',
            ],
            [
                "nombre" => 'content.reports',
                "icono" => 'print',
            ],
            [
                "nombre" => 'content.settings',
                "icono" => 'cog',
            ],
            [
                "nombre" => 'content.orders',
                "icono" => 'list',
            ],
            [
                "nombre" => 'content.sales',
                "icono" => 'chart-pie',
            ],
            [
                "nombre" => 'content.deliveries',
                "icono" => 'truck',
            ],
            [
                "nombre" => 'content.record',
                "icono" => 'archive',
            ],
        ]);
    }
}
