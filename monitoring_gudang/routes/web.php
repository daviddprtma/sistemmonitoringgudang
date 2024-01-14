<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Artisan;

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

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboards', function () {
        return view('welcome');
    });

    Route::resource('items','ItemController');

    Route::resource('initems','InItemController');
    
    Route::resource('outitems','OutItemController');

    Route::resource('categories','CategoryController');
    
    Route::resource('dashboards','DashboardController');
    
    Route::resource('units','UnitController');

    Route::resource('stokopnames','StokOpnameController');

    Route::resource('reports','ReportController');
    
    Route::post('/category/changeFoto','CategoryController@changeFoto')
    ->name('categories.changeFoto');
    
    Route::post('/item/changeFotoBarang','ItemController@changeFotoBarang')
    ->name('items.changeFotoBarang');

    Route::get("invoicepdf/{id}",'OutItemController@invoicePdf')
    ->name('invoicepdf');

    Route::get("invoicepdfstokopname/{id}",'StokOpnameController@invoicePdfStokOpname')
    ->name('invoicepdfstokopname');

    Route::get('/','ReportController@index');

    Route::get('/report','ReportController@dataReport');
});

Auth::routes(['verify' => true]);
Route::get('/', 'DashboardController@index');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
