<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::middleware(['auth'])->group(function(){
    Route::resource('items','ItemController');

    Route::resource('categories','CategoryController');
    
    Route::resource('profiles','ProfileController');
    
    Route::resource('dashboards','DashboardController');
    
    Route::resource('units','UnitController');
    
    Route::post('/category/changeFoto','CategoryController@changeFoto')
    ->name('categories.changeFoto');
    
    Route::post('/item/changeFotoBarang','ItemController@changeFotoBarang')
    ->name('items.changeFotoBarang');
    
    Route::post('/item/getItem','CariBarangController@getItem')
    ->name('items.cariBarang');
});

Auth::routes(['verify' => true]);

Route::get('/', 'DashboardController@index');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

