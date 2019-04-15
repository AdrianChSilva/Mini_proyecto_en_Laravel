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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ruta', function () {
    return "Hola mundo";
});

Route::get('/name/{name}/otraVariable/{otraVar}', function ($name, $otraVar) {
    return 'Hola estoy concatenando ' . $name . ' ' . $otraVar;
});

Route::get('pepe/{var?}', 'PruebaControlador@prueba');

Route::resource('trainers', 'EntrenadorControlador');
Route::resource('lists', 'ListUserController');
//Route::resource('pokemons', 'PokemonController');
Route::post('trainers/{trainer}/pokemons','PokemonController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
