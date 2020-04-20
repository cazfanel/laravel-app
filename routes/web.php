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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/worldwide', 'CovidController@worlwide');

Route::get('/hello', function () {
    echo '<xmp>: '. print_r("Hola soy Cristian", true) .'</xmp>';
});


Route::get('/hi', function () {
    echo '<xmp>: '. print_r("hi", true) .'</xmp>';
    $users = DB::table('laravel')->get();
    dd($users);
});
