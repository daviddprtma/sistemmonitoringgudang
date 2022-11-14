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

Route::get('/dashboards', function () {
    return view('welcome');
});

Route::resource('items','ItemController');

Route::resource('categories','CategoryController');

Route::resource('profiles','ProfileController');

Route::resource('dashboards','DashboardController');

Route::resource('multiunits','MultiUnitController');

Route::post('/category/changeFoto','CategoryController@changeFoto')
->name('categories.changeFoto');

Route::post('/item/changeFotoBarang','ItemController@changeFotoBarang')
->name('items.changeFotoBarang');