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
                "nombre" => 'listar provincias',
                "multilenguaje" => 'content.provinces',
                "ruta"  => 'provincias.index',
                "icono" => 'provincias.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear provincias',
                "multilenguaje" => NULL,
                "ruta"  => 'provincias.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar provincias',
                "multilenguaje" => NULL,
                "ruta"  => 'provincias.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar provincias',
                "multilenguaje" => NULL,
                "ruta"  => 'provincias.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],



            [
                "nombre" => 'listar ciudades',
                "multilenguaje" => 'content.cities',
                "ruta"  => 'ciudades.index',
                "icono" => 'ciudades.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear ciudades',
                "multilenguaje" => NULL,
                "ruta"  => 'ciudades.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar ciudades',
                "multilenguaje" => NULL,
                "ruta"  => 'ciudades.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar ciudades',
                "multilenguaje" => NULL,
                "ruta"  => 'ciudades.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar ciudades',
                "multilenguaje" => NULL,
                "ruta"  => 'ciudades.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar ciudades',
                "multilenguaje" => NULL,
                "ruta"  => 'ciudades.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar sucursales',
                "multilenguaje" => 'content.offices',
                "ruta"  => 'sucursales.index',
                "icono" => 'sucursales.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear sucursales',
                "multilenguaje" => NULL,
                "ruta"  => 'sucursales.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar sucursales',
                "multilenguaje" => NULL,
                "ruta"  => 'sucursales.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar sucursales',
                "multilenguaje" => NULL,
                "ruta"  => 'sucursales.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar sucursales',
                "multilenguaje" => NULL,
                "ruta"  => 'sucursales.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar sucursales',
                "multilenguaje" => NULL,
                "ruta"  => 'sucursales.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar categorias',
                "multilenguaje" => 'content.categories',
                "ruta"  => 'categorias.index',
                "icono" => 'categorias.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear categorias',
                "multilenguaje" => NULL,
                "ruta"  => 'categorias.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar categorias',
                "multilenguaje" => NULL,
                "ruta"  => 'categorias.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar categorias',
                "multilenguaje" => NULL,
                "ruta"  => 'categorias.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar categorias',
                "multilenguaje" => NULL,
                "ruta"  => 'categorias.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar categorias',
                "multilenguaje" => NULL,
                "ruta"  => 'categorias.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar tipos',
                "multilenguaje" => 'content.types',
                "ruta"  => 'tipos.index',
                "icono" => 'tipos.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear tipos',
                "multilenguaje" => NULL,
                "ruta"  => 'tipos.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar tipos',
                "multilenguaje" => NULL,
                "ruta"  => 'tipos.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar tipos',
                "multilenguaje" => NULL,
                "ruta"  => 'tipos.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar tipos',
                "multilenguaje" => NULL,
                "ruta"  => 'tipos.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar tipos',
                "multilenguaje" => NULL,
                "ruta"  => 'tipos.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar presentaciones',
                "multilenguaje" => 'content.presentations',
                "ruta"  => 'presentaciones.index',
                "icono" => 'presentaciones.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear presentaciones',
                "multilenguaje" => NULL,
                "ruta"  => 'presentaciones.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar presentaciones',
                "multilenguaje" => NULL,
                "ruta"  => 'presentaciones.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar presentaciones',
                "multilenguaje" => NULL,
                "ruta"  => 'presentaciones.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar presentaciones',
                "multilenguaje" => NULL,
                "ruta"  => 'presentaciones.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar presentaciones',
                "multilenguaje" => NULL,
                "ruta"  => 'presentaciones.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar productos',
                "multilenguaje" => 'content.products',
                "ruta"  => 'productos.index',
                "icono" => 'productos.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear productos',
                "multilenguaje" => NULL,
                "ruta"  => 'productos.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar productos',
                "multilenguaje" => NULL,
                "ruta"  => 'productos.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar productos',
                "multilenguaje" => NULL,
                "ruta"  => 'productos.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar productos',
                "multilenguaje" => NULL,
                "ruta"  => 'productos.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar productos',
                "multilenguaje" => NULL,
                "ruta"  => 'productos.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar movimientos existencias',
                "multilenguaje" => NULL,
                "ruta"  => 'movimientosexistencias.index',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'crear movimientos existencias',
                "multilenguaje" => NULL,
                "ruta"  => 'movimientosexistencias.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar movimientos existencias',
                "multilenguaje" => NULL,
                "ruta"  => 'movimientosexistencias.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar imagenes productos',
                "multilenguaje" => NULL,
                "ruta"  => 'imagenesproductos.index',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar imagenes productos',
                "multilenguaje" => NULL,
                "ruta"  => 'imagenesproductos.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar imagenes productos',
                "multilenguaje" => NULL,
                "ruta"  => 'imagenesproductos.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'predeterminar imagenes productos',
                "multilenguaje" => NULL,
                "ruta"  => 'imagenesproductos.default',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar roles',
                "multilenguaje" => 'content.roles',
                "ruta"  => 'roles.index',
                "icono" => 'roles.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear roles',
                "multilenguaje" => NULL,
                "ruta"  => 'roles.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar roles',
                "multilenguaje" => NULL,
                "ruta"  => 'roles.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar roles',
                "multilenguaje" => NULL,
                "ruta"  => 'roles.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar roles',
                "multilenguaje" => NULL,
                "ruta"  => 'roles.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar roles',
                "multilenguaje" => NULL,
                "ruta"  => 'roles.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            
            
            [
                "nombre" => 'listar menus',
                "multilenguaje" => 'content.menus',
                "ruta"  => 'menus.index',
                "icono" => 'menus.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear menus',
                "multilenguaje" => NULL,
                "ruta"  => 'menus.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar menus',
                "multilenguaje" => NULL,
                "ruta"  => 'menus.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar menus',
                "multilenguaje" => NULL,
                "ruta"  => 'menus.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar menus',
                "multilenguaje" => NULL,
                "ruta"  => 'menus.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar menus',
                "multilenguaje" => NULL,
                "ruta"  => 'menus.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'agregar menus roles',
                "multilenguaje" => NULL,
                "ruta"  => 'menusroles.add',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar menus roles',
                "multilenguaje" => NULL,
                "ruta"  => 'menusroles.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar menus roles',
                "multilenguaje" => NULL,
                "ruta"  => 'menusroles.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            
            
            [
                "nombre" => 'listar usuarios',
                "multilenguaje" => 'content.users',
                "ruta"  => 'usuarios.index',
                "icono" => 'usuarios.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'crear usuarios',
                "multilenguaje" => NULL,
                "ruta"  => 'usuarios.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar usuarios',
                "multilenguaje" => NULL,
                "ruta"  => 'usuarios.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar usuarios',
                "multilenguaje" => NULL,
                "ruta"  => 'usuarios.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar usuarios',
                "multilenguaje" => NULL,
                "ruta"  => 'usuarios.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar usuarios',
                "multilenguaje" => NULL,
                "ruta"  => 'usuarios.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'activar usuarios',
                "multilenguaje" => NULL,
                "ruta"  => 'usuarios.activate',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar pedidos vendidos',
                "multilenguaje" => 'content.orders',
                "ruta"  => 'pedidos.vendedor',
                "icono" => 'pedidos.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'listar pedidos despachados',
                "multilenguaje" => 'content.deliveries',
                "ruta"  => 'pedidos.repartidor',
                "icono" => 'pedidos.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'mostrar pedidos vendidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.showOrder',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'mostrar pedidos despachados',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.showDelivery',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'crear pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.create',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'editar pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.edit',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'cambiar estado pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.change',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'pagar pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'pedidos.toPay',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'listar items pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'itemspedidos.index',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'grabar items pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'itemspedidos.store',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'actualizar items pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'itemspedidos.update',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'eliminar items pedidos',
                "multilenguaje" => NULL,
                "ruta"  => 'itemspedidos.destroy',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],

           
            [
                "nombre" => 'listar reportes',
                "multilenguaje" => 'content.reports',
                "ruta"  => 'reportes.index',
                "icono" => 'reportes.png',
                "esVisible" => '1',
            ],
            [
                "nombre" => 'reporte ventas',
                "multilenguaje" => NULL,
                "ruta"  => 'reportes.ventas',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'reporte inventario',
                "multilenguaje" => NULL,
                "ruta"  => 'reportes.inventario',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],


            [
                "nombre" => 'cuenta clientes',
                "multilenguaje" => NULL,
                "ruta"  => 'clientes.cuenta',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'historial clientes',
                "multilenguaje" => NULL,
                "ruta"  => 'clientes.historial',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'pedido clientes',
                "multilenguaje" => NULL,
                "ruta"  => 'clientes.pedido',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],
            [
                "nombre" => 'preordenar pedido',
                "multilenguaje" => NULL,
                "ruta"  => 'clientes.preorden',
                "icono" => 'nofoto.png',
                "esVisible" => '0',
            ],

            
        ]);
    }
}
