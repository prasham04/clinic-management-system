<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MajorController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login'])->name('api.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout')->middleware('auth:sanctum');

Route::group([

    'middleware' => ['auth:sanctum']

], function() {

    // Majors
Route::group(
    [
    'prefix' => 'majors',
    'as' => 'majors.',
    'controller' => MajorController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('delete'); 
    }
);

// Doctors
Route::group(
    [
    'prefix' => 'doctors',
    'as' => 'doctors.',
    'controller' => DoctorController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('delete'); 
    }
);

// Booking
Route::group(
    [
    'prefix' => 'bookings',
    'as' => 'bookings.',
    'controller' => BookingController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::delete('/destroy/{id}', 'destroy')->name('delete'); 
    }
);

// Users
Route::group(
    [
    'prefix' => 'users',
    'as' => 'users.',
    'controller' => UserController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('delete'); 
    }
);

// Contacts
Route::group(
    [
    'prefix' => 'contacts',
    'as' => 'contacts.',
    'controller' => ContactController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy/{id}', 'destroy')->name('delete'); 
    }
);

// Contacts
Route::group(
    [
    'prefix' => 'settings',
    'as' => 'settings.',
    'controller' => SettingController::class
    ],
    function () {
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/update', 'update')->name('update');
    }
);

});


