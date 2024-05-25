<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\AuditController;

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




 Route::resource('audits', AuditController::class)->only(['index', 'show']);



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Auth::routes();

 Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Auth::routes();



// Grouping routes under authentication middleware
Route::group(['middleware' => 'auth'], function() {
    // Routes for Patients
    Route::resource('patients', PatientController::class);

    // Routes for Medical Records
    Route::resource('medical-records', MedicalRecordController::class);

    // Routes for Doctors
    Route::resource('doctors', DoctorController::class);

    // Routes for Hospitals
    Route::resource('hospitals', HospitalController::class);

});