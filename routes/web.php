<?php

use App\Http\Controllers\BirthController;
use App\Http\Controllers\BirthDeathReportController;
use App\Http\Controllers\CommunicableReportController;
use App\Http\Controllers\DeathController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\IntensiveCareController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientFollowUpController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OperationReportController;
use App\Http\Controllers\DiseasesReportController;
use App\Http\Controllers\NnCommunicableReportController;


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

Route::get('/',function(){
    return view('auth.login');
});

Auth::routes();

// Role
Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class)  ;

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('doctor', DoctorController::class);

Route::resource('section', SectionController::class);

Route::resource('ward', WardController::class);

Route::resource('reception', ReceptionController::class);

Route::resource('patient', PatientController::class);

Route::resource('intensive_care', IntensiveCareController::class);

Route::resource('operation', OperationController::class);

Route::resource('examination', ExaminationsController::class);

Route::resource('patient_follow_up', PatientFollowUpController::class);

Route::resource('medical_record' ,MedicalRecordController::class);

Route::resource('report', ReportController::class);

Route::resource('operation_report', OperationReportController::class);

Route::resource('diseases_report', DiseasesReportController::class);

Route::resource('Communicable' ,CommunicableReportController::class);

Route::resource('nonCommunicable' ,NnCommunicableReportController::class);

Route::resource('birth' ,BirthController::class);

Route::resource('death', DeathController::class);

Route::resource('birthDeathReport', BirthDeathReportController::class);

