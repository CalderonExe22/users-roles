<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureUserIsReader;
use Illuminate\Support\Facades\Route;



Route::get('auth/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login.submit');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{user}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::resource('users', UserController::class);

    Route::post('/roles/{role}/restore', [RoleController::class, 'restore'])->name('roles.restore');
    Route::delete('/roles/{role}/forceDelete', [RoleController::class, 'forceDelete'])->name('roles.forceDelete');
    Route::resource('roles', RoleController::class);

    Route::get('/users/{user}/assign-role', [UserRoleController::class, 'edit'])->name('users.assign-roles.edit');
    Route::put('/users/{user}/assign-role', [UserRoleController::class, 'update'])->name('users.assign-roles.update');

});

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class)->only(['index', 'show']);
    Route::resource('users', UserController::class)->only(['index', 'show']);
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});