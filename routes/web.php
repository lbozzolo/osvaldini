<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require(__DIR__ . '/admin.php');

Route::get('/', function () {
  return redirect('home');
});

Route::get('home', function () {
    return redirect('web');
});


Route::group(['prefix' => 'web'], function () {

    Route::get('/', [
        'as' => 'home',
        'uses' => 'WebController@index'
    ]);

    Route::get('farmacia', [
        'as' => 'web.farmacia',
        'uses' => 'WebController@farmacia'
    ]);

    Route::get('servicios', [
        'as' => 'web.servicios',
        'uses' => 'WebController@servicios'
    ]);

    Route::get('nosotros', [
        'as' => 'web.nosotros',
        'uses' => 'WebController@nosotros'
    ]);

    Route::get('proyectos/{id}/detalle', [
        'as' => 'web.proyectos.detalle',
        'uses' => 'WebController@detalleProyecto'
    ]);

    Route::get('galeria', [
        'as' => 'web.galeria',
        'uses' => 'WebController@galeria'
    ]);

    Route::get('productos/{categoriaId?}', [
        'as' => 'web.productos',
        'uses' => 'WebController@productos'
    ]);

    Route::get('producto/{id}/detalle', [
        'as' => 'web.producto.detalle',
        'uses' => 'WebController@detalleProducto'
    ]);

    Route::get('contacto', [
        'as' => 'web.contacto',
        'uses' => 'WebController@contacto'
    ]);

    Route::post('contacto', [
        'as' => 'web.post.contacto',
        'uses' => 'WebController@postContacto'
    ]);

    Route::post('newsletter', [
        'as' => 'web.suscribe.newsletter',
        'uses' => 'MarcaController@suscribe'
    ]);

    Route::get('/home', 'WebController@index');

});




