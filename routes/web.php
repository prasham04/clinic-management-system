<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\MajorController;
use App\Http\Controllers\user\DoctorController;
use App\Http\Controllers\user\ContactController;

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


// Front routes

Route::group([

    'as' => 'front.'

], function () {

    // Home Page
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Majors    
    Route::get('/majors', [MajorController::class, 'index'])->name('majors');
    Route::get('/majors/{major}', [MajorController::class,'show'])->name('majors.show');

    // Doctors    
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
    Route::get('/booking/{doctor}',[DoctorController::class, 'bookingPage'])->name('bookingPage');    
    Route::post('/booking/{doctor}',[DoctorController::class, 'booking'])->name('booking');

    // Contacts
    Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact-us/store', [ContactController::class, 'store'])->name('contact.store');

});

require_once __DIR__ . '/auth.php';
