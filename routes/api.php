<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SearchController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use App\Http\Controllers\Admin\AppointmentWithUserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'auth'], function () {
    Route::post('/logout', [UserLoginController::class, 'logout']);
});


Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'],function(){

    Route::post('/login', [UserLoginController::class, 'login']);


    //DOCTORS ROUTES
    Route::post('/add-doctor', [DoctorController::class,'addDoctor']);
    Route::delete('/delete-doctor/{id}', [DoctorController::class, 'deleteDoctor']);
    Route::get('/display/doctors',[DoctorController::class,'displayDoctorsDataUsingJS']);
    Route::post('/update-doctor/{id}',[DoctorController::class,'updateDoctor']);
    Route::get('/get-doctor/{id}', [DoctorController::class, 'getDoctorById']);

    //USERS ROUTES
    Route::get('/display/users',[UsersController::class,'getUsers']);
    Route::post('/register-users',[UsersController::class,'createUsers']);
    Route::get('/get-user/{id}', [UsersController::class, 'getUsersById']);
    Route::put('/update-user/{id}',[UsersController::class,'updateUser']);
    Route::delete('/delete-user/{id}',[UsersController::class,'deleteUser']);


    //USERS WITH APPOINTMENTS
    Route::get('/book-appointments',[AppointmentWithUserController::class,'displayAppointmentDataUsingJS']);
    Route::get('/get-available-doctors', [AppointmentWithUserController::class, 'getAvailableDoctors']);
    Route::post('/store-appointment', [AppointmentWithUserController::class, 'storeAppointment']);
    Route::get('/fetch-users',[UsersController::class,'getUsers']);
    Route::middleware('auth:sanctum')->get('/user-appointments', [AppointmentWithUserController::class, 'getUserAppointments']);
    Route::delete('/delete-appointment/{id}', [AppointmentWithUserController::class, 'deleteAppointment']);
    Route::put('/update-appointment/{id}',[AppointmentWithUserController::class,'updateAppointmentDetails']);
    Route::get('/get-appointment/{id}',[AppointmentWithUserController::class,' getAppointmentById']);


    //SEARCH ROUTE
    Route::get('/search-doctors', [SearchController::class, 'searchDoctors']);

});
