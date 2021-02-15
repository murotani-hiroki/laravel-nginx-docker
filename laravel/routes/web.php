<?php

use Illuminate\Support\Facades\Log;
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

Route::get('/top', function () {
    return view('main');
});

Route::any('/search', 'FxController@search');
Route::any('/new', 'FxController@newModal');
Route::any('/save', 'FxController@save');
Route::any('/edit', 'FxController@editModal');
Route::any('/delete', 'FxController@delete');
