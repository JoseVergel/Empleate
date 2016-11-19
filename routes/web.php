<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('registro','RegistroController@show');
Route::post('registro','RegistroController@store');

Route::get('login','LoginController@showLogin');
Route::post('login','LoginController@postLogin');
Route::get('logout','LoginController@logout'); 

Route::get('home','homeController@show');

Route::group(['namespaces' => 'admin'], function() {
    Route::get('admin/login','admin\AdminLoginController@show');
	Route::post('admin/login','admin\AdminLoginController@postLogin');
	Route::get('admin/logout','admin\AdminLoginController@logout');
});


Route::get('admin/home','admin\homeController@index');
//Cargos
Route::get('admin/cargos/show','admin\cargoController@showCargos');
Route::get('admin/cargos/create','admin\cargoController@createCargos');
Route::post('admin/cargos/create','admin\cargoController@storeCargos');
Route::post('admin/cargos/show','admin\cargoController@showCargos2');
//Categorias
Route::get('admin/categorias/show','admin\categoriaController@showCategorias');
Route::get('admin/categorias/create','admin\categoriaController@createCategorias');
Route::post('admin/categorias/create','admin\categoriaController@storeCategorias');
Route::post('admin/categorias/edit','admin\categoriaController@editCategorias');
Route::post('admin/categorias/search','admin\categoriaController@searchCategorias');
