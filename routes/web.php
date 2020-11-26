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
Route::get('/', 'App\Http\Controllers\Controller@homepage');
Route::get('/cadastro', 'App\Http\Controllers\Controller@cadastrar');


Route::get('/login', 'App\Http\Controllers\Controller@viewlogin');
Route::post('/auth', ['as'=> 'user.login', 'uses' => 'App\Http\Controllers\DashboardController@auth']);
Route::get('/dashboard', ['as'=> 'user.dashboard', 'uses' => 'App\Http\Controllers\DashboardController@index']);

