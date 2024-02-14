<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\AuthController;

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
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']); // Update to accept POST method

// Admin routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//     // Add more admin routes here
// });

// Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Panel Routes
Route::get('/', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');