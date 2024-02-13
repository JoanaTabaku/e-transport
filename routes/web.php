<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to
| the "web" middleware group. Make something great!
|
*/

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']); // Update to accept POST method

// Admin routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//     // Add more admin routes here
// });

// Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


// Route::namespace('Admin')->group(function () {
//     Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
//     // Other admin routes
// });

// Route::namespace('User')->middleware(['auth'])->group(function () {
//     // User routes
//     Route::get('/', 'DashboardController@index')->name('user.dashboard');
// });
