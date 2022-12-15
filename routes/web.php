<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\RentVehicleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookingVehicleController;
use App\Http\Controllers\Admin\Approve1BookingVehicleController;
use App\Http\Controllers\Admin\Approve2BookingVehicleController;
use App\Models\Approve1BookingVehicles;

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

Route::get('login', [AuthController::class, 'login'])->name('login');

Route::post('login', [AuthController::class, 'loginStore'])->name('loginPost');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'admin'], function() {
        Route::resource('booking-vehicles', BookingVehicleController::class);

        Route::resource('drivers', DriverController::class);
        
        Route::resource('employees', EmployeeController::class);

        Route::resource('vehicles', VehicleController::class);

        Route::resource('rent-vehicles', RentVehicleController::class);

        Route::resource('approve1', Approve1BookingVehicleController::class);

        Route::resource('approve2', Approve2BookingVehicleController::class);

        Route::resource('users', UserController::class);
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
