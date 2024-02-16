<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Panel\RolesController;
use App\Http\Controllers\Panel\UsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\NotificationsController;
use App\Http\Controllers\Panel\SubscriptionsController;
use App\Http\Controllers\Base\UserController;
use App\Http\Controllers\Base\AdminController;




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

// // Registration routes
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

// // Login routes
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']); // Update to accept POST method



// // Panel Routes
// Route::get('/', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
// Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');


// Redirect unauthenticated users to the login form
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
//     Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
// });

// Login and registration routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// User Panel Routes

Route::group(['middleware' => ['user']], function () {
    Route::get('/', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
});


// Admin Panel Routes
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // Subscriptions
    Route::get('/admin/subscriptions', [SubscriptionsController::class, 'index'])->name('admin.subscriptions');
    Route::get('/admin/subscriptions/new', [SubscriptionsController::class, 'new'])->name('admin.new.subscription');
    Route::post('/admin/subscriptions/new', [SubscriptionsController::class, 'create'])->name('admin.create.subscription');
    Route::get('/admin/subscriptions/{id}', [SubscriptionsController::class, 'show'])->name('admin.view.subscription');
    Route::get('/admin/subscriptions/edit/{id}', [SubscriptionsController::class, 'edit'])->name('admin.edit.subscription');
    Route::post('/admin/subscriptions/edit/{id}', [SubscriptionsController::class, 'update'])->name('admin.update.subscription');
    Route::get('/admin/subscriptions/delete/{id}', [SubscriptionsController::class, 'delete'])->name('admin.delete.subscription');

    // Roles
    Route::get('/admin/roles', [RolesController::class, 'index'])->name('admin.roles');
    Route::get('/admin/roles/new', [RolesController::class, 'new'])->name('admin.new.role');
    Route::post('/admin/roles/new', [RolesController::class, 'create'])->name('admin.create.role');
    Route::get('/admin/roles/{id}', [RolesController::class, 'show'])->name('admin.view.role');
    Route::get('/admin/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.edit.role');
    Route::post('/admin/roles/edit/{id}', [RolesController::class, 'update'])->name('admin.update.role');
    Route::get('/admin/roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.delete.role');

    // Users
    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/new', [UsersController::class, 'new'])->name('admin.new.user');
    Route::post('/admin/users/new', [UsersController::class, 'create'])->name('admin.create.user');
    Route::get('/admin/users/{id}', [UsersController::class, 'show'])->name('admin.view.user');
    Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.edit.user');
    Route::post('/admin/users/edit/{id}', [UsersController::class, 'update'])->name('admin.update.user');
    Route::get('/admin/users/delete/{id}', [UsersController::class, 'delete'])->name('admin.delete.user');

    // Notifications
    Route::get('/admin/notifications', [NotificationsController::class, 'index'])->name('admin.notifications');
    Route::get('/admin/notifications/new', [NotificationsController::class, 'new'])->name('admin.new.notification');
    Route::post('/admin/notifications/new', [NotificationsController::class, 'create'])->name('admin.create.notification');
    Route::get('/admin/notifications/{id}', [NotificationsController::class, 'show'])->name('admin.view.notification');
    Route::get('/admin/notifications/edit/{id}', [NotificationsController::class, 'edit'])->name('admin.edit.notification');
    Route::post('/admin/notifications/edit/{id}', [NotificationsController::class, 'update'])->name('admin.update.notification');
    Route::get('/admin/notifications/delete/{id}', [NotificationsController::class, 'delete'])->name('admin.delete.notification');
});
