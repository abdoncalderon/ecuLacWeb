<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('getTiposCategoria/{categoria}','ProductoController@getTiposCategoria')->name('productos.getTiposCategoria')->middleware('auth');;
Route::get('getPresentacionesCategoria/{categoria}','ProductoController@getPresentacionesCategoria')->name('productos.getPresentacionesCategoria')->middleware('auth');

Route::get('/provincias','ProvinciaController@index')->name('provincias.index')->middleware('auth','permiso');
Route::get('/provincias/create','ProvinciaController@create')->name('provincias.create')->middleware('auth','permiso');
Route::post('/provincias','ProvinciaController@store')->name('provincias.store')->middleware('auth','permiso');
Route::get('/provincias/{provincia}','ProvinciaController@destroy')->name('provincias.destroy')->middleware('auth','permiso');

Route::get('/ciudades','CiudadController@index')->name('ciudades.index')->middleware('auth','permiso');
Route::get('/ciudades/create','CiudadController@create')->name('ciudades.create')->middleware('auth','permiso');
Route::post('/ciudades','CiudadController@store')->name('ciudades.store')->middleware('auth','permiso');
Route::get('/ciudades/{ciudad}/edit','CiudadController@edit')->name('ciudades.edit')->middleware('auth','permiso');
Route::patch('/ciudades/{ciudad}','CiudadController@update')->name('ciudades.update')->middleware('auth','permiso');
Route::get('/ciudades/{ciudad}','CiudadController@destroy')->name('ciudades.destroy')->middleware('auth','permiso');

Route::get('/sucursales','SucursalController@index')->name('sucursales.index')->middleware('auth','permiso');
Route::get('/sucursales/create','SucursalController@create')->name('sucursales.create')->middleware('auth','permiso');
Route::post('/sucursales','SucursalController@store')->name('sucursales.store')->middleware('auth','permiso');
Route::get('/sucursales/{sucursal}/edit','SucursalController@edit')->name('sucursales.edit')->middleware('auth','permiso');
Route::patch('/sucursales/{sucursal}','SucursalController@update')->name('sucursales.update')->middleware('auth','permiso');
Route::get('/sucursales/{sucursal}','SucursalController@destroy')->name('sucursales.destroy')->middleware('auth','permiso');

Route::get('/categorias','CategoriaController@index')->name('categorias.index')->middleware('auth','permiso');
Route::get('/categorias/create','CategoriaController@create')->name('categorias.create')->middleware('auth','permiso');
Route::post('/categorias','CategoriaController@store')->name('categorias.store')->middleware('auth','permiso');
Route::get('/categorias/{categoria}/edit','CategoriaController@edit')->name('categorias.edit')->middleware('auth','permiso');
Route::patch('/categorias/{categoria}','CategoriaController@update')->name('categorias.update')->middleware('auth','permiso');
Route::get('/categorias/{categoria}','CategoriaController@destroy')->name('categorias.destroy')->middleware('auth','permiso');

Route::get('/tipos','TipoController@index')->name('tipos.index')->middleware('auth','permiso');
Route::get('/tipos/create','TipoController@create')->name('tipos.create')->middleware('auth','permiso');
Route::post('/tipos','TipoController@store')->name('tipos.store')->middleware('auth','permiso');
Route::get('/tipos/{tipo}/edit','TipoController@edit')->name('tipos.edit')->middleware('auth','permiso');
Route::patch('/tipos/{tipo}','TipoController@update')->name('tipos.update')->middleware('auth','permiso');
Route::get('/tipos/{tipo}','TipoController@destroy')->name('tipos.destroy')->middleware('auth','permiso');

Route::get('/presentaciones','PresentacionController@index')->name('presentaciones.index')->middleware('auth','permiso');
Route::get('/presentaciones/create','PresentacionController@create')->name('presentaciones.create')->middleware('auth','permiso');
Route::post('/presentaciones','PresentacionController@store')->name('presentaciones.store')->middleware('auth','permiso');
Route::get('/presentaciones/{presentacion}/edit','PresentacionController@edit')->name('presentaciones.edit')->middleware('auth','permiso');
Route::patch('/presentaciones/{presentacion}','PresentacionController@update')->name('presentaciones.update')->middleware('auth','permiso');
Route::get('/presentaciones/{presentacion}','PresentacionController@destroy')->name('presentaciones.destroy')->middleware('auth','permiso');

Route::get('/productos','ProductoController@index')->name('productos.index')->middleware('auth','permiso');
Route::get('/productos/create','ProductoController@create')->name('productos.create')->middleware('auth','permiso');
Route::post('/productos','ProductoController@store')->name('productos.store')->middleware('auth','permiso');
Route::get('/productos/edit/{producto}','ProductoController@edit')->name('productos.edit')->middleware('auth','permiso');
Route::patch('/productos/{producto}','ProductoController@update')->name('productos.update')->middleware('auth','permiso');
Route::get('/productos/{producto}','ProductoController@destroy')->name('productos.destroy')->middleware('auth','permiso');

Route::get('/roles','RolController@index')->name('roles.index')->middleware('auth','permiso');
Route::get('/roles/create','RolController@create')->name('roles.create')->middleware('auth','permiso');
Route::post('/roles','RolController@store')->name('roles.store')->middleware('auth','permiso');
Route::get('/roles/{rol}/edit','RolController@edit')->name('roles.edit')->middleware('auth','permiso');
Route::patch('/roles/{rol}','RolController@update')->name('roles.update')->middleware('auth','permiso');
Route::get('/roles/{rol}','RolController@destroy')->name('roles.destroy')->middleware('auth','permiso');

Route::get('/menus','MenuController@index')->name('menus.index')->middleware('auth','permiso');
Route::get('/menus/create','MenuController@create')->name('menus.create')->middleware('auth','permiso');
Route::post('/menus','MenuController@store')->name('menus.store')->middleware('auth','permiso');
Route::get('/menus/{menu}/edit','MenuController@edit')->name('menus.edit')->middleware('auth','permiso');
Route::patch('/menus/{menu}','MenuController@update')->name('menus.update')->middleware('auth','permiso');
Route::get('/menus/{menu}','MenuController@destroy')->name('menus.destroy')->middleware('auth','permiso');

Route::get('/usuarios','UsuarioController@index')->name('usuarios.index')->middleware('auth','permiso');
Route::get('/usuarios/create','UsuarioController@create')->name('usuarios.create')->middleware('auth','permiso');
Route::post('/usuarios','UsuarioController@store')->name('usuarios.store')->middleware('auth','permiso');
Route::get('/usuarios/{usuario}/edit','UsuarioController@edit')->name('usuarios.edit')->middleware('auth','permiso');
Route::get('/usuarios/activate/{usuario}','UsuarioController@activate')->name('usuarios.activate')->middleware('auth');
Route::patch('/usuarios/{usuario}','UsuarioController@update')->name('usuarios.update')->middleware('auth','permiso');
Route::get('/usuarios/{usuario}','UsuarioController@destroy')->name('usuarios.destroy')->middleware('auth','permiso');

Route::get('/imagenesproductos/{producto}','ImagenProductoController@index')->name('imagenesproductos.index')->middleware('auth','permiso');
Route::post('/imagenesproductos','ImagenProductoController@store')->name('imagenesproductos.store')->middleware('auth','permiso');
Route::get('/imagenesproductos/default/{imagen}','ImagenProductoController@default')->name('imagenesproductos.default')->middleware('auth','permiso');
Route::get('/imagenesproductos/destroy/{imagen}','ImagenProductoController@destroy')->name('imagenesproductos.destroy')->middleware('auth','permiso');

Route::get('/movimientosexistencias/{producto}','MovimientoExistenciaController@index')->name('movimientosexistencias.index')->middleware('auth','permiso');
Route::get('/movimientosexistencias/crear/{producto}','MovimientoExistenciaController@create')->name('movimientosexistencias.create')->middleware('auth','permiso');
Route::post('/movimientosexistencias','MovimientoExistenciaController@store')->name('movimientosexistencias.store')->middleware('auth','permiso');

Route::get('/pedidos/vendedor','PedidoController@vendedor')->name('pedidos.vendedor')->middleware('auth','permiso');
Route::get('/pedidos/repartidor','PedidoController@repartidor')->name('pedidos.repartidor')->middleware('auth','permiso');
Route::get('/pedidos/create','PedidoController@create')->name('pedidos.create')->middleware('auth','permiso');
Route::get('/pedidos/vendido/show/{pedido}','PedidoController@showOrder')->name('pedidos.showOrder')->middleware('auth','permiso');
Route::get('/pedidos/despachado/show/{pedido}','PedidoController@showDelivery')->name('pedidos.showDelivery')->middleware('auth','permiso');
Route::get('/pedidos/edit/{pedido}','PedidoController@edit')->name('pedidos.edit')->middleware('auth','permiso');
Route::get('/pedidos/update/{pedido}','PedidoController@update')->name('pedidos.update')->middleware('auth','permiso');
Route::get('/pedidos/change/{pedido}/{estado}','PedidoController@change')->name('pedidos.change')->middleware('auth','permiso');
Route::post('/pedidos','PedidoController@store')->name('pedidos.store')->middleware('auth','permiso');
Route::get('/pedidos/eliminar/{pedido}','PedidoController@destroy')->name('pedidos.destroy')->middleware('auth','permiso');
Route::post('/pedidos/pagar/{pedido}','PedidoController@toPay')->name('pedidos.toPay')->middleware('auth','permiso');
Route::get('/pedidos/ubicacion/{cliente}','PedidoController@location')->name('pedidos.location')->middleware('auth','permiso');


Route::get('/clientes/cuenta','ClienteController@cuenta')->name('clientes.cuenta')->middleware('auth');
Route::get('/clientes/historial','ClienteController@historial')->name('clientes.historial')->middleware('auth');
Route::get('/clientes/pedido','ClienteController@pedido')->name('clientes.pedido')->middleware('auth');
Route::get('/clientes/preorden/{pedido}','ClienteController@preorden')->name('clientes.preorden')->middleware('auth');

Route::get('/itemspedidos','ItemPedidoController@index')->name('itemspedidos.index')->middleware('auth');
Route::post('/itemspedidos','ItemPedidoController@store')->name('itemspedidos.store')->middleware('auth');
Route::get('/itemspedidos/{itempedido}/{estado}','ItemPedidoController@update')->name('itemspedidos.update')->middleware('auth','permiso');
Route::get('/itemspedidos/{itempedido}','ItemPedidoController@destroy')->name('itemspedidos.destroy')->middleware('auth');

Route::get('/menusroles/add/{rol}','MenuRolController@add')->name('menusroles.add')->middleware('auth','permiso');
Route::post('/menusroles/{rol}','MenuRolController@store')->name('menusroles.store')->middleware('auth','permiso');
Route::get('/menusroles/{menu}/{rol}','MenuRolController@destroy')->name('menusroles.destroy')->middleware('auth','permiso');

// Route::get('/facturas/show/{factura}','FacturasController@cuenta')->name('facturas.show')->middleware('auth','permiso');

Route::get('/reportes','ReporteController@index')->name('reportes.index')->middleware('auth','permiso');
Route::get('/reportes/ventas','ReporteController@ventas')->name('reportes.ventas')->middleware('auth','permiso');
Route::get('/reportes/inventario','ReporteController@inventario')->name('reportes.inventario')->middleware('auth','permiso');

Route::get('/tienda/busqueda','TiendaController@busqueda')->name('tienda.busqueda');
Route::get('/tienda/catalogo/{orden?}/{busqueda?}','TiendaController@catalogo')->name('tienda.catalogo');
Route::get('/tienda/vitrina','TiendaController@vitrina')->name('tienda.vitrina');
Route::get('/tienda/filtroDestacados','TiendaController@filtroDestacados')->name('tienda.filtroDestacados');
Route::get('/tienda/filtroCategoria/{categoria}/{orden?}/{busqueda?}','TiendaController@filtroCategoria')->name('tienda.filtroCategoria');
Route::get('/tienda/filtroTipo/{tipo}/{orden?}/{busqueda?}','TiendaController@filtroTipo')->name('tienda.filtroTipo');
Route::get('/tienda/filtroPresentacion/{presentacion}/{orden?}/{busqueda?}','TiendaController@filtroPresentacion')->name('tienda.filtroPresentacion');
Route::get('/tienda/filtroBorrar','TiendaController@filtroBorrar')->name('tienda.filtroBorrar');
Route::get('/tienda/estante/{producto}','TiendaController@estante')->name('tienda.estante');