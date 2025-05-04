<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TransactionController;

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'],function(){
    Route::get('/display/appointment',[TransactionController::class,'displayAppointmentDataUsingJS']);
    Route::get('/display/doctors',[TransactionController::class,'displayDoctorsDataUsingJS']);

    //DOCTORS ROUTES
    Route::post('/add-doctor', [DoctorController::class,'addDoctor']);
    Route::delete('/delete-doctor/{id}', [DoctorController::class, 'deleteDoctor']);
    Route::get('/display/doctors',[TransactionController::class,'displayDoctorsDataUsingJS']);
    Route::post('/update-doctor/{id}',[DoctorController::class,'updateDoctor']);
    Route::get('/get-doctor/{id}', [DoctorController::class, 'getDoctorById']);

    //USERS ROUTES
    Route::get('/display/users',[UsersController::class,'getUsers']);
    Route::post('/register-users',[UsersController::class,'createUsers']);
    Route::get('/get-user/{id}', [UsersController::class, 'getUsersById']);
    Route::put('/update-user/{id}',[UsersController::class,'updateUser']);
    Route::delete('/delete-user/{id}',[UsersController::class,'deleteUser']);


});
