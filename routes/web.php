<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('getTiposCategoria/{categoria}','ProductoController@getTiposCategoria')->name('productos.getTiposCategoria')->middleware('auth');;
Route::get('getPresentacionesCategoria/{categoria}','ProductoController@getPresentacionesCategoria')->name('productos.getPresentacionesCategoria')->middleware('auth');

Route::get('/configuracion','ConfiguracionController@index')->name('configuracion.index')->middleware('auth');

Route::get('/provincias','ProvinciaController@index')->name('provincias.index')->middleware('auth');
Route::get('/provincias/create','ProvinciaController@create')->name('provincias.create')->middleware('auth');
Route::post('/provincias','ProvinciaController@store')->name('provincias.store')->middleware('auth');
Route::get('/provincias/{provincia}','ProvinciaController@destroy')->name('provincias.destroy')->middleware('auth');

Route::get('/ciudades','CiudadController@index')->name('ciudades.index')->middleware('auth');
Route::get('/ciudades/create','CiudadController@create')->name('ciudades.create')->middleware('auth');
Route::post('/ciudades','CiudadController@store')->name('ciudades.store')->middleware('auth');
Route::get('/ciudades/{ciudad}/edit','CiudadController@edit')->name('ciudades.edit')->middleware('auth');
Route::patch('/ciudades/{ciudad}','CiudadController@update')->name('ciudades.update')->middleware('auth');
Route::get('/ciudades/{ciudad}','CiudadController@destroy')->name('ciudades.destroy')->middleware('auth');

Route::get('/sucursales','SucursalController@index')->name('sucursales.index')->middleware('auth');
Route::get('/sucursales/create','SucursalController@create')->name('sucursales.create')->middleware('auth');
Route::post('/sucursales','SucursalController@store')->name('sucursales.store')->middleware('auth');
Route::get('/sucursales/{sucursal}/edit','SucursalController@edit')->name('sucursales.edit')->middleware('auth');
Route::patch('/sucursales/{sucursal}','SucursalController@update')->name('sucursales.update')->middleware('auth');
Route::get('/sucursales/{sucursal}','SucursalController@destroy')->name('sucursales.destroy')->middleware('auth');

Route::get('/categorias','CategoriaController@index')->name('categorias.index')->middleware('auth');
Route::get('/categorias/create','CategoriaController@create')->name('categorias.create')->middleware('auth');
Route::post('/categorias','CategoriaController@store')->name('categorias.store')->middleware('auth');
Route::get('/categorias/{categoria}/edit','CategoriaController@edit')->name('categorias.edit')->middleware('auth');
Route::patch('/categorias/{categoria}','CategoriaController@update')->name('categorias.update')->middleware('auth');
Route::get('/categorias/{categoria}','CategoriaController@destroy')->name('categorias.destroy')->middleware('auth');

Route::get('/tipos','TipoController@index')->name('tipos.index')->middleware('auth');
Route::get('/tipos/create','TipoController@create')->name('tipos.create')->middleware('auth');
Route::post('/tipos','TipoController@store')->name('tipos.store')->middleware('auth');
Route::get('/tipos/{tipo}/edit','TipoController@edit')->name('tipos.edit')->middleware('auth');
Route::patch('/tipos/{tipo}','TipoController@update')->name('tipos.update')->middleware('auth');
Route::get('/tipos/{tipo}','TipoController@destroy')->name('tipos.destroy')->middleware('auth');

Route::get('/presentaciones','PresentacionController@index')->name('presentaciones.index')->middleware('auth');
Route::get('/presentaciones/create','PresentacionController@create')->name('presentaciones.create')->middleware('auth');
Route::post('/presentaciones','PresentacionController@store')->name('presentaciones.store')->middleware('auth');
Route::get('/presentaciones/{presentacion}/edit','PresentacionController@edit')->name('presentaciones.edit')->middleware('auth');
Route::patch('/presentaciones/{presentacion}','PresentacionController@update')->name('presentaciones.update')->middleware('auth');
Route::get('/presentaciones/{presentacion}','PresentacionController@destroy')->name('presentaciones.destroy')->middleware('auth');

Route::get('/roles','RolController@index')->name('roles.index')->middleware('auth');
Route::get('/roles/create','RolController@create')->name('roles.create')->middleware('auth');
Route::post('/roles','RolController@store')->name('roles.store')->middleware('auth');
Route::get('/roles/{rol}/edit','RolController@edit')->name('roles.edit')->middleware('auth');
Route::patch('/roles/{rol}','RolController@update')->name('roles.update')->middleware('auth');
Route::get('/roles/{rol}','RolController@destroy')->name('roles.destroy')->middleware('auth');

Route::get('/productos','ProductoController@index')->name('productos.index')->middleware('auth');
Route::get('/productos/create','ProductoController@create')->name('productos.create')->middleware('auth');
Route::post('/productos','ProductoController@store')->name('productos.store')->middleware('auth');
Route::get('/productos/{productos}/edit','ProductoController@edit')->name('productos.edit')->middleware('auth');
Route::patch('/productos/{producto}','ProductoController@update')->name('productos.update')->middleware('auth');
Route::get('/productos/{producto}','ProductoController@destroy')->name('productos.destroy')->middleware('auth');

Route::get('/imagenesproductos/{producto}','ImagenProductoController@index')->name('imagenesproductos.index')->middleware('auth');
Route::post('/imagenesproductos','ImagenProductoController@store')->name('imagenesproductos.store')->middleware('auth');
Route::get('/imagenesproductos/default/{imagen}','ImagenProductoController@default')->name('imagenesproductos.default')->middleware('auth');
Route::get('/imagenesproductos/destroy/{imagen}','ImagenProductoController@destroy')->name('imagenesproductos.destroy')->middleware('auth');

Route::get('/usuarios','UsuarioController@index')->name('usuarios.index')->middleware('auth');
Route::get('/usuarios/create','UsuarioController@create')->name('usuarios.create')->middleware('auth');
Route::post('/usuarios','UsuarioController@store')->name('usuarios.store')->middleware('auth');
Route::get('/usuarios/{usuario}/edit','UsuarioController@edit')->name('usuarios.edit')->middleware('auth');
Route::get('/usuarios/activate/{usuario}','UsuarioController@activate')->name('usuarios.activate')->middleware('auth');
Route::patch('/usuarios/{usuario}','UsuarioController@update')->name('usuarios.update')->middleware('auth');
Route::get('/usuarios/{usuario}','UsuarioController@destroy')->name('usuarios.destroy')->middleware('auth');

Route::post('/tienda/busqueda','TiendaController@busqueda')->name('tienda.busqueda');
Route::get('/tienda/catalogo/{busqueda?}','TiendaController@catalogo')->name('tienda.catalogo');
Route::get('/tienda/vitrina','TiendaController@vitrina')->name('tienda.vitrina');
Route::get('/tienda/filtroDestacados','TiendaController@filtroDestacados')->name('tienda.filtroDestacados');
Route::get('/tienda/filtroCategoria/{categoria}/{busqueda?}','TiendaController@filtroCategoria')->name('tienda.filtroCategoria');
Route::get('/tienda/filtroTipo/{tipo}/{busqueda?}','TiendaController@filtroTipo')->name('tienda.filtroTipo');
Route::get('/tienda/filtroPresentacion/{presentacion}/{busqueda?}','TiendaController@filtroPresentacion')->name('tienda.filtroPresentacion');
Route::get('/tienda/filtroBorrar','TiendaController@filtroBorrar')->name('tienda.filtroBorrar');
Route::get('/tienda/estante/{producto}','TiendaController@estante')->name('tienda.estante');

Route::get('/itemspedidos','ItemPedidoController@index')->name('itemspedidos.index')->middleware('auth');
Route::post('/itemspedidos','ItemPedidoController@store')->name('itemspedidos.store')->middleware('auth');
Route::get('/itemspedidos/{itempedido}','ItemPedidoController@destroy')->name('itemspedidos.destroy')->middleware('auth');

Route::get('/movimientosexistencias','MovimientoExistenciaController@index')->name('movimientosexistencias.index')->middleware('auth');
Route::get('/movimientosexistencias/{producto}','MovimientoExistenciaController@create')->name('movimientosexistencias.create')->middleware('auth');
Route::post('/movimientosexistencias','MovimientoExistenciaController@store')->name('movimientosexistencias.store')->middleware('auth');

Route::get('/pedidos/{vista}','PedidoController@index')->name('pedidos.index')->middleware('auth');
Route::get('/pedidos/create/{vista}','PedidoController@create')->name('pedidos.create')->middleware('auth');
Route::get('/pedidos/show/{vista}/{pedido}','PedidoController@show')->name('pedidos.show')->middleware('auth');
Route::post('/pedidos/{vista}','PedidoController@store')->name('pedidos.store')->middleware('auth');
Route::get('/pedidos/eliminar/{pedido}','PedidoController@destroy')->name('pedidos.destroy')->middleware('auth');
Route::post('/pedidos/pagar/{pedido}','PedidoController@toPay')->name('pedidos.toPay')->middleware('auth');


Route::get('/clientes/cuenta','ClienteController@cuenta')->name('clientes.cuenta')->middleware('auth');
Route::get('/clientes/historial','ClienteController@historial')->name('clientes.historial')->middleware('auth');
Route::get('/clientes/pedido','ClienteController@pedido')->name('clientes.pedido')->middleware('auth');
Route::get('/clientes/preorden/{pedido}','ClienteController@preorden')->name('clientes.preorden')->middleware('auth');

Route::get('/facturas/show/{factura}','FacturasController@cuenta')->name('facturas.show')->middleware('auth');