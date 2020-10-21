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

Route::get('/', 'Pgw_pfe3dsController@index')->name('home');
Route::post('/', 'Pgw_pfe3dsController@pay')->name('pgw-pfe3ds');
Route::post('sendcode', 'Pgw_pfe3dsController@sendCode');
Route::post('validation', 'Pgw_pfe3dsController@validation')
            ->name('validation');

// Route::get('/', function () {
//     return view('pgw-pfe3ds.index');
// });
