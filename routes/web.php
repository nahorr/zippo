<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
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

//Home
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth','verified'])->group(function () {

    //Home
    Route::get('/home/{data?}', [HomeController::class, 'index'])->name('home');
    Route::post('/zipcode', [HomeController::class, 'storeZipCode'])->name('store.zipcode');

});