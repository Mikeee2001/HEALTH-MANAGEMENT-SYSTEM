<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\TransactionController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use App\Http\Controllers\Admin\AppointmentWithUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', function () {
    return view('admin.pages.dashboard');
})->name('home');

Route::get('/appointments', [TransactionController::class, 'viewAppointments'])->name('profile');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

//ADMIN
 //Route::middleware(['auth:web'])->prefix('admin')->group(function () {

 Route::get('/doctors', [DoctorController::class, 'displayDoctorsDataUsingJS']);
//  Route::get('/tableView', [TableController::class, 'toDisplayPage'])->name('tableView');
   // Route::get('/get-users',[UsersController::class,'getUsers']);

Route::get('/get-users',[UsersController::class,'displayUsersData'])->name('get-users');
Route::get('/user-appointments', [AppointmentWithUserController::class, 'viewUsersAppointments'])->name('users-appointments');


 Route::group([], function () {
    Route::get('/{page}', [PageController::class, 'showPage'])->name('page');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/get-user1', [PageController::class, 'getUsers']);
    Route::get('/get-user2', [PageController::class, 'getUser2']);
    Route::get('/get-user3', [PageController::class, 'getUser3']);
    Route::get('/dashboard', [PageController::class, 'Dashboard'])->name('dashboard');
    Route::get('/doctors', [DoctorController::class, 'viewDoctors'])->name('doctors');
    // Route::get('/doctors', [DoctorController::class, 'displayDoctorsDataUsingJS']);
    // Route::post('/doctors/upload-image', [DoctorController::class, 'uploadImage'])->name('doctors.upload-image');

});


 //});
 //Route::get('/user-appointments', [TransactionController::class, 'viewAppointments'])->name('user-appointments');
