<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionsController;


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
Route::resource('user', UserController::class);
Route::get('login',[SessionsController::class,'create']);
Route::post('login',[SessionsController::class,'store'])->name('login');
Route::post('logout',[SessionsController::class,'destroy'])->name('logout');
