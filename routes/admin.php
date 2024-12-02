<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\MajorController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\auth\LoginController;


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',

] , function() {

    // Guest
    Route::group([
        'middleware' => ['guest'],
        'controller' => LoginController::class,
    ],
    function() {
        Route::get('/login', 'loginPage')->name('loginPage');
        Route::post('/login', 'login')->name('login');
    }
    );

    // Auth
    Route::group([
        'middleware' => ['auth', 'checkIsAdmin']
    ],
    function() {
    
    Route::get('', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Majors
    Route::get('/majors', [MajorController::class, 'index'])->name('major.index');
    Route::get('/majors/create', [MajorController::class, 'create'])->name('major.create');
    Route::post('/majors/store', [MajorController::class, 'store'])->name('major.store');
    Route::get('/majors/edit/{major}', [MajorController::class, 'edit'])->name('major.edit');
    Route::put('/majors/update/{major}', [MajorController::class, 'update'])->name('major.update');
    Route::delete('/majors/delete/{major}', [MajorController::class, 'destroy'])->name('major.destroy');

    // Doctors
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctors/store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctors/edit/{doctor}', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctors/update/{doctor}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctors/delete/{doctor}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    // Bookings
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::delete('/bookings/delete/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UserController::class,'store'])->name('user.store');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // contacts 
    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('/contacts/delete/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

     // Settings
     Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
     Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    }
    );
});