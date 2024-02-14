<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\RolesController;

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

// Admin Panel Routes
Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

// Roles
Route::get('/admin/roles', [RolesController::class, 'index'])->name('admin.roles');
Route::get('/admin/roles/{id}', [RolesController::class, 'show'])->name('admin.view.role');
Route::get('/admin/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.edit.role');
Route::post('/admin/roles/edit/{id}', [RolesController::class, 'update'])->name('admin.update.role');
Route::post('/admin/roles/{id}', [RolesController::class, 'delete'])->name('admin.delete.role');



// User Panel Routes
Route::get('/', [DashboardController::class, 'userDashboard'])->name('user.dashboard');