<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirects'])->middleware('auth', 'verified');

Route::get('add/doctor', [AdminController::class, 'addDoctor']);
Route::post('save/doctor', [AdminController::class, 'saveDoctor']);

//appointment
Route::post('appointment', [HomeController::class, 'appointment']);
Route::get('myappointment', [HomeController::class, 'myappointment']);
Route::get('cancel/appointment/{id}', [HomeController::class, 'cancelappointment']);

//admin part appointment
Route::get('view/appointment', [AdminController::class, 'viewappointment']);
Route::get('appointment/approve/{id}', [AdminController::class, 'approveAppointment']);
Route::get('appointment/cancel/{id}', [AdminController::class, 'cancelAppointment']);

//doctor
Route::get('show/doctor', [AdminController::class, 'showDoctors']);
Route::get('delete/doctor/{id}', [AdminController::class, 'deleteDoctor']);
Route::get('update/doctor/{id}', [AdminController::class, 'updateDoctor']);
// Route::post('update/doctor/data/{id}', [AdminController::class, 'updateDoctorData']);
Route::post('update/doctor/data/{id}', [AdminController::class, 'updateDoctorData'])->name('update.doctor.data');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
