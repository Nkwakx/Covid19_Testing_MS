<?php

use Admin\UsersController;
use App\Mail\ResponseMail;
use User\ProfileController;
use Illuminate\Support\Facades\Route;
use Laboratorist\LaboratoristController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\VitalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\TestRequestController;
use App\Http\Controllers\Patient\PatientController;

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

Route::get('/', function () {
    return view('main-index');
});

Route::get('redirects', 'HomeController@index');
Route::view('/registration-success','registration-success')->name('registration.success');

Route::get('/contact-us', 'HomeController@contact')->name('contact-us');
Route::get('/about-us', 'HomeController@about')->name('about-us');
Route::get('/services', 'HomeController@service')->name('services');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');

Route::get('/statuses', [PatientController::class, 'status'])->name('statuses');
Route::get('/payment', [PatientController::class, 'payment'])->name('payment');
Route::get('/appointments', [PatientController::class, 'appointment'])->name('appointments');
Route::get('/addFamilyMember', [PatientController::class, 'addDependent'])->name('addFamilyMember');
Route::get('/makeRequest', [PatientController::class, 'makeRequest'])->name('makeRequest');
Route::post('/makeRequest', [PatientController::class, 'testRequest'])->name('testRequest');
Route::get('/index', [PatientController::class, 'index'])->name('index');
Route::get('/indexes', [NurseController::class, 'index'])->name('indexes');

Route::post('/dependents', [PatientController::class, 'store'])->name('addDependent');
Route::get('/account', [AuthController::class, 'account'])->name('account');
Route::post('/account', [AuthController::class, 'store'])->name('user.account');

Route::get('/account/{id}', [AuthController::class, 'edit'])->name('user.edit_profile');
Route::patch('/accounts/{id}', [AuthController::class, 'update'])->name('user.edit_save');


Route::prefix('user')->middleware(['auth'])->name('user.')->group(function () {
    Route::get('/profile', ProfileController::class)->name('profile');
});

Route::get('/profile', [PatientController::class, 'user_profile'])->name('patient_profile');


Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {
    Route::resource('/users', UsersController::class);
    Route::get('/patients', 'Admin\UsersController@patients')->name('patients');
    Route::get('/nurses', 'Admin\UsersController@nurses')->name('nurses');
    Route::get('/allusers', 'Admin\UsersController@allusers')->name('allusers');
    Route::get('/suburb_favourite', 'Admin\UsersController@nurseSuburb')->name('suburb_favourite');
    Route::get('/patient_request', 'Admin\UsersController@patientRequest')->name('patient_request');
    Route::get('/nurse_schedule', 'Admin\UsersController@nurseSchedule')->name('nurse_schedule');
    Route::patch('/accept_request/{id}', 'Admin\UsersController@AcceptRequest')->name('accept_request');
    Route::post('/assign_request', 'Admin\UsersController@assignNurse')->name('assign_request');
    Route::post('schedule_log/records', 'Admin\UsersController@records')->name('schedule_log/records');
});

Route::post('/store', [PaymentController::class, 'store'])->name('payment_info');

Route::prefix('labUser')->middleware(['auth', 'auth.isLabUser'])->name('lab.')->group(function () {
    Route::resource('/labUsers', LaboratoristController::class);
});
Route::prefix('nurse')->middleware(['auth', 'auth.isNurse'])->name('nurse.')->group(function () {
    // Route::get('/profiles', [NurseController::class, 'user_profile'])->name('nurse_profile');
    Route::patch('/account/{id}', [NurseController::class, 'show'])->name('user.edit_saves');
    Route::resource('/nurses', 'NurseController');
});
Route::prefix('nurse')->middleware(['auth', 'auth.isNurse'])->name('nurse.')->group(function () {
    Route::resource('/favourite', 'FavouriteController');
    Route::resource('/testlog', 'RequestLogController');
});

Route::resource('/assign', DependentController::class);
Route::resource('/test_vitals', 'TestRequestController');

Route::get('/email', function() {
    return new ResponseMail();
});

// Route::prefix('patient')->middleware(['auth', 'auth.isPatient'])->name('patient.')->group(function () {
//     Route::resource('/patients', PatientController::class);
// });
