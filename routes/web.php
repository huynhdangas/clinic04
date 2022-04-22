<?php

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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);

// patient appointment
Route::get('/new-appointment/{doctorId}/{date}', [App\Http\Controllers\FrontendController::class, 'show'])->name('create.appointment');


Route::group(['middleware' => ['auth', 'patient']], function () {
    Route::post('/book/appointment', [App\Http\Controllers\FrontendController::class, 'store'])->name('booking.appointment');
    Route::get('/my-booking', [App\Http\Controllers\FrontendController::class, 'myBookings'])->name('my.booking');
    Route::get('/user-profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/user-profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');
    Route::get('/my-prescription', [App\Http\Controllers\FrontendController::class, 'myPrescription'])->name('my.prescription');
    

            
});




Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('doctor', 'DoctorController');
    Route::resource('department', 'DepartmentController');
    

});

// doctor
Route::group(['middleware' => ['auth', 'doctor']], function () {
    Route::resource('appointment', 'AppointmentController');
    Route::post('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'updateTime'])->name('update');
    Route::get('/patients-today', [App\Http\Controllers\PrescriptionController::class, 'index'])->name('patients.today');
    Route::post('/prescription', [App\Http\Controllers\PrescriptionController::class, 'store'])->name('prescription');
    Route::get('/prescription/{userId}/{date}', [App\Http\Controllers\PrescriptionController::class, 'show'])->name('prescription.show');
    Route::get('/prescribed-patients', [App\Http\Controllers\PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');
    Route::get('status/update/test/{id}', [App\Http\Controllers\PrescriptionController::class, 'updateStatusTest'])->name('accept.test');
    Route::get('/showtest/{bookingId}', [App\Http\Controllers\PrescriptionController::class, 'showTest'])->name('test.pre');


});

// nurse
Route::group(['middleware' => ['auth', 'nurse']], function () {
    // dat lich gium khach
    // check lich kham
    Route::get('/patients', [App\Http\Controllers\PatientlistController::class, 'index'])->name('patient');
    Route::get('/patients/all', [App\Http\Controllers\PatientlistController::class, 'allTimeAppointment'])->name('all.appointment');
    Route::get('/status/update/{id}', [App\Http\Controllers\PatientlistController::class, 'toggleStatus'])->name('update.status');
    Route::resource('medicine', 'MedicineController');


    Route::get('/qrcode', [App\Http\Controllers\PatientlistController::class, 'qrCode'])->name('qr.code');


});






// testdoctor
Route::group(['middleware' => ['auth', 'testdoctor']], function () {
    Route::get('/test/patients', [App\Http\Controllers\TestController::class, 'index'])->name('test.patient');
    Route::post('/test', [App\Http\Controllers\TestController::class, 'store'])->name('test');
    Route::get('/test/{bookingId}', [App\Http\Controllers\TestController::class, 'show'])->name('test.show');   
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
