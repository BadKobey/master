<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\Models\Organization;
use App\Models\Transport;

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



Route::group(['prefix' => 'admin'], function() {
    Route::resource('users', UserController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('transports', TransportController::class);
});


