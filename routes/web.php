<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\A001\AppsController as A001AppsController;
use App\Http\Controllers\A001\SitesController as A001SitesController;
use App\Http\Controllers\A001\SqlController as A001SqlController;;

use App\Http\Controllers\A002\PaymentsController as A002PaymentsController;
use App\Http\Controllers\A002\LoansController as A002LoansController;

use App\Http\Controllers\A003\TasksController as A003TasksController;
use App\Http\Controllers\A003\CommentsController as A003CommentsController;

use App\Http\Controllers\A004\DebtsController as A004DebtsController;


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

//A001
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('A001/apps', A001AppsController::class);
Route::resource('A001/sites', A001SitesController::class);
Route::get('A001/sql/backup', [A001SqlController::class, 'backup']);
Route::get('A001/sql/run', [A001SqlController::class, 'run']);

//A002
Route::resource('A002/payments', A002PaymentsController::class);
Route::resource('A002/loans', A002LoansController::class);

//A003
Route::resource('A003/tasks', A003TasksController::class);
Route::resource('A003/comments', A003CommentsController::class);

//A004
Route::resource('A004/debts', A004DebtsController::class);
