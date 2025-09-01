<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function() { return redirect('/login'); });
Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::resource('hospitals', HospitalController::class);
    Route::resource('patients', PatientController::class);
    // AJAX endpoints
    Route::delete('hospitals/{hospital}/ajax-delete', [HospitalController::class,'ajaxDestroy'])->name('hospitals.ajax-delete');
    Route::delete('patients/{patient}/ajax-delete', [PatientController::class,'ajaxDestroy'])->name('patients.ajax-delete');
    Route::get('patients/by-hospital/{hospital}', [PatientController::class,'byHospital'])->name('patients.by-hospital');
});
