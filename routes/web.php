<?php

use App\Http\Controllers\archiveBirthController;
use App\Http\Controllers\BioFollowUpController;
use App\Http\Controllers\BiometricsController;
use App\Http\Controllers\BirthArchiveController;
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
use App\Http\Controllers\OperationAttachmentController;
use App\Http\Controllers\PatientFinalDataController;

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

Auth::routes(
    [
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]
);

// Role
Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class)  ;

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//الصفحه الرئيسيه

Route::resource('doctor', DoctorController::class);//الأطباء

Route::resource('section', SectionController::class);//الاقسام

Route::resource('ward', WardController::class);//العنابر

Route::resource('reception', ReceptionController::class);//الإستقبال

Route::resource('patient', PatientController::class);//ادارة المرضى

Route::get('/search', [PatientController::class , 'search'])->name('search_teckit');//مجهول

Route::resource('final_data', PatientFinalDataController::class);//بيانات المريض النهائيه

Route::resource('intensive_care', IntensiveCareController::class);

Route::resource('operation', OperationController::class);//العمليات

Route::resource('examination', ExaminationsController::class);//الفحوصات

Route::resource('patient_follow_up', PatientFollowUpController::class);//متابعة المريض

Route::resource('medical_record' ,MedicalRecordController::class);//السجل الطبي

Route::resource('report', ReportController::class);//التقارير

Route::resource('operation_report', OperationReportController::class);//تقارير العمليات

Route::resource('diseases_report', DiseasesReportController::class);//تقارير الامراض

Route::resource('Communicable' ,CommunicableReportController::class);

Route::resource('nonCommunicable' ,NnCommunicableReportController::class);

Route::resource('birth' ,BirthController::class);//المواليد

Route::resource('death', DeathController::class);// الوفيات

Route::resource('birthDeathReport', BirthDeathReportController::class);//تقرير المواليد و الوفيات

Route::resource('birthArchive', BirthArchiveController::class);//ارشيف المواليد

Route::resource('OperationAttachment' , OperationAttachmentController::class);//مرفقات العمليه

Route::get('openFile/{teckit_number}/{file_name}',[OperationAttachmentController::class , 'openFile'])->name('openFile');//عرض الإقرار الطبي

Route::get('downloadFile/{invoice_number}/{file_name}',[OperationAttachmentController::class , 'downloadFile']);//تحميل الإقرار الطبي

Route::resource('biometrics', BiometricsController::class);//العلامات الحيويه
Route::resource('BioFollow', BioFollowUpController::class);//العلامات الحيويه للمتابعه

});
