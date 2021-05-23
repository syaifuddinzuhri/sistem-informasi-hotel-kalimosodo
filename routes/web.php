<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/rooms', [HomeController::class, 'room'])->name('home.rooms');
Route::get('/room/{id}', [HomeController::class, 'detailRoom'])->name('home.detail-room');
Route::get('/facility', [HomeController::class, 'facility'])->name('home.facility');
Route::get('/about-us', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::group(['prefix' => 'admin', 'middleware' => ['role']], function () {
        Route::get('/', function () {
            return route('dashboard.index');
        });
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
        Route::get('/room', [RoomController::class, 'room'])->name('api.room');
        Route::get('/room-has-facilities/{id}', [RoomController::class, 'getRoomHasFacilites'])->name('api.roomhasfacilities');
        Route::get('/users', [UserController::class, 'user'])->name('api.user');
        Route::get('/blog', [RoomController::class, 'room'])->name('api.blog');
        Route::get('/data-room-type', [RoomTypeController::class, 'room_type'])->name('api.room_type');
    });
});