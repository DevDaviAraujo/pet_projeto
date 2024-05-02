<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/refreshable','App\Http\Controllers\Website\WebsiteController@refreshable');
Route::get('/','App\Http\Controllers\Website\WebsiteController@home');

Route::get('/home','App\Http\Controllers\Website\WebsiteController@home');
Route::get('/login','App\Http\Controllers\Website\WebsiteController@login');
Route::get('/cadastro','App\Http\Controllers\Website\WebsiteController@cadastro');
Route::get('/usuario/{username}','App\Http\Controllers\Website\WebsiteController@usuario');
Route::get('/pet/{id}','App\Http\Controllers\Website\WebsiteController@pet');

Route::post('/login/usuario','App\Http\Controllers\Usuarios\UsuariosController@loginUsuario');
Route::post('/deslogar/usuario','App\Http\Controllers\Usuarios\UsuariosController@deslogarUsuario');
Route::post('/filtrar','App\Http\Controllers\Website\WebsiteController@filtrar');
Route::post('/pesquisar','App\Http\Controllers\Website\WebsiteController@pesquisar');

Route::prefix('/cadastrar')->group(function () { 

    Route::post('/usuario','App\Http\Controllers\Usuarios\UsuariosController@cadastrarUsuario');
    Route::post('/pet','App\Http\Controllers\Usuarios\UsuariosController@cadastrarPet');
    Route::post('/adjetivo','App\Http\Controllers\Usuarios\UsuariosController@cadastrarAdjetivo');

}); 

Route::prefix('/excluir')->group(function () { 

    Route::post('/usuario/{id}','App\Http\Controllers\Usuarios\UsuariosController@excluirUsuario');
    Route::post('/pet/{id}','App\Http\Controllers\Usuarios\UsuariosController@excluirPet');
    Route::post('/adjetivo','App\Http\Controllers\Usuarios\UsuariosController@excluirAdjetivo');

}); 


