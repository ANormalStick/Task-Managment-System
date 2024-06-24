<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;

Route::post('tasks/{task}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('tasks/{task}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('boards', BoardController::class);
    Route::resource('boards.tasks', TaskController::class); // Nested routes for tasks under boards

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users');
    Route::post('/admin/users/{user}/assign-role', [AdminController::class, 'assignRole'])->name('admin.assignRole');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});
