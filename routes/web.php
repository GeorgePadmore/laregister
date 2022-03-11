<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
    return redirect('/login');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('dashboard', 'dashboard'); 
    Route::get('login', 'index')->name('login');
    Route::post('login', 'postLogin')->name('post-login'); 
    Route::get('register', 'register')->name('register');
    Route::post('register', 'postRegister')->name('post-register'); 
    Route::post('logout', 'signOut')->name('logout');
});

