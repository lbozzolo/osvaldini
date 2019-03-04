<?php

Auth::routes();

Route::get('/admin', [
    'as' => 'admin',
    'uses' => 'HomeController@index'
]);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');


Route::resource('nosotros', 'NosotrosController');

Route::resource('users', 'UserController');

Route::resource('laboratorios', 'LaboratorioController');

Route::resource('productos', 'ProductoController');

Route::resource('images', 'ImageController');

Route::resource('marcas', 'MarcaController');

Route::resource('categorias', 'CategoriaController');

Route::resource('sliders', 'SliderController');


//imagenes

Route::get('imagenes/{file}', [
    'as' => 'imagenes.ver',
    'uses' => 'ImageController@verImage'
]);

Route::post('imagenes/{id}/{class}', [
    'as' => 'images.save',
    'uses' => 'ImageController@storeImage'
]);

Route::post('imagenes/store', [
    'as' => 'images.store',
    'uses' => 'ImageController@store'
]);

Route::get('imagenes/{id}/{class}/{imagen}/principal', [
    'as' => 'images.main',
    'uses' => 'ImageController@principalImage',
]);

Route::post('/{id}/{class}/demos/jquery-image-upload', [
    'as' => 'subir.imagen',
    'uses' => 'ImageController@saveJqueryImageUpload'
]);

Route::get('sliders/{id}/activate', [
    'as' => 'sliders.activate',
    'uses' => 'SliderController@activate'
]);

// Ver PDF
Route::get('ver-pdf/{file}', [
    'as' => 'admin.ver.pdf',
    'uses' => 'ProductoController@verPdf'
]);