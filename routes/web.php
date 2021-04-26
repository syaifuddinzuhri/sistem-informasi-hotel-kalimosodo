<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/customer', CustomerController::class);
    Route::resource('/room', RoomController::class);
    Route::resource('/facility', FacilityController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/room-type', RoomTypeController::class);
});

Route::prefix('api')->group(function () {
    Route::get('/data-facility', [FacilityController::class, 'facility'])->name('api.facility');
    Route::get('/data-room-type', [RoomTypeController::class, 'room_type'])->name('api.room_type');
});