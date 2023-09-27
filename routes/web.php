<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\A001\AppsController as A001AppsController;
use App\Http\Controllers\A001\SitesController as A001SitesController;
use App\Http\Controllers\A002\PaymentsController as A002PaymentsController;
use App\Http\Controllers\A002\LoansController as A002LoansController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('A001/apps', A001AppsController::class);
Route::resource('A001/sites', A001SitesController::class);
Route::resource('A002/payments', A002PaymentsController::class);
Route::resource('A002/loans', A002LoansController::class);


