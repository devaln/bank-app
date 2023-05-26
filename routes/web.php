<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\ParticularController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['guest']], function () {
    /* Login */
    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::post('/login', [LoginController::class,'loginCheck'])->name('user.login');
    /* Registred */
    Route::get('/register', [LoginController::class,'index'])->name('user.register');
    Route::post('/save', [LoginController::class,'saveUser'])->name('user.save');
});
/* Dashboard */
Route::get('/home', [LoginController::class,'login'])->name('admin.dashboard');
/* Logout */
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

/* Admin Resources */
Route::group(['middleware' => ['verify.auth'], 'prefix' => 'admin'], function () {
    /* Departments */
    Route::resource('departments', DepartmentController::class);
    /* Account Type */
    Route::resource('account-type', AccountTypeController::class);
    /* User */
    Route::resource('users', UserController::class);
    Route::get('profile', [UserController::class, 'editProfile'])->name('users.profile');
    Route::put('profile/{id}/store', [UserController::class, 'Profile'])->name('user.profile.store');
    /* employee */
    Route::resource('employees', EmployeeController::class);
    /* Nominees */
    Route::resource('nominees', NomineeController::class);
    /* Addresses */
    Route::resource('addresses', AddressController::class);
    /* Particular */
    Route::resource('particulars', ParticularController::class);
});