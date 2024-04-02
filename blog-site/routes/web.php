<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', [\App\Http\Controllers\FrontendController::class,'view'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// *********** Dashboard route Start ***********

// ****** Profile Routes Start
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'view'])->name('profile');
Route::post('/profile/picture/add', [App\Http\Controllers\ProfileController::class, 'profile_picture'])->name('profile_picture');
Route::post('/profile/name/change', [App\Http\Controllers\ProfileController::class, 'name_change'])->name('name_change');
Route::post('/profile/email/change', [App\Http\Controllers\ProfileController::class, 'email_change'])->name('email_change');
Route::post('/profile/otp/verify', [App\Http\Controllers\ProfileController::class, 'otp_verify'])->name('otp_verify');
// ****** Profile Routes End

// ****** Category Routes Start
Route::resource('category',CategoriesController::class);
// ****** Category Routes End

// *********** Dashboard route Start ***********



// *********** Front end route Start ***********

Route::get('user/',[App\Http\Controllers\UsersController::class, 'login_view'])->name('login_view');
Route::post('user/login',[App\Http\Controllers\UsersController::class, 'user_login'])->name('user_login');

// *********** Front end route End ***********
