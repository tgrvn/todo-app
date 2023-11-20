<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'index'])->name('todos');
Route::get('/shared', [TodoController::class, 'shared'])->name('shared');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::get('/forgot-password', [PasswordResetController::class, 'index'])->name('reset-password');

