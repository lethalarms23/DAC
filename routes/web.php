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



//Route Dashboard
Route::get('/perfil/dashboard','App\Http\Controllers\UserController@dash')->name('perfil.dashboard');

//Route Create
Route::get('/musica/create','App\Http\Controllers\MusicaController@create')->name('musica.create');

//Route Store
Route::post('/musica/store','App\Http\Controllers\MusicaController@store')->name('musica.store');

//Route Edit

//Route Update

//Route Index
Route::get('/', 'App\Http\Controllers\UserController@index')->name('index');
Route::get('/musica/index','App\Http\Controllers\MusicaController@index')->name('musica.index');

//Route Show
Route::get('/musica/show/{id}','App\Http\Controllers\MusicaController@show')->name('musica.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Perfis

Route::get('/perfil/{nome}','App\Http\Controllers\PerfilController@index')->name('perfil.index');

Route::get('/perfil/{nome}/edit','App\Http\Controllers\PerfilController@edit')->name('perfil.edit');

Route::post('/perfil/{nome}/update','App\Http\Controllers\PerfilController@update')->name('perfil.update');

//Route Frames

Route::get('/frame/create','App\Http\Controllers\FrameController@create')->name('frame.create');

Route::post('/frame/store','App\Http\Controllers\FrameController@store')->name('frame.store');