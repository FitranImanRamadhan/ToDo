<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/', [UserController::class, 'login'])->name('login');


Route::post('/login', [UserController::class, 'login_action'])->name('login.action');


Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register_action'])->name('register.action');


Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');


    Route::post('/todolists', [TodolistController::class, 'store'])->name('todolists.store');
    Route::get('/todolists/create', [TodolistController::class, 'create'])->name('todolists.create');
    Route::get('/todolists', [TodolistController::class, 'index'])->name('todolists.index');
    Route::get('/todolists/index2', [TodolistController::class, 'index2'])->name('todolists.index2');
    Route::get('/todolists/{id}', [TodolistController::class, 'show'])->name('todolists.show');
    Route::get('/todolists/{id}/edit', [TodolistController::class, 'edit'])->name('todolists.edit');
    Route::put('/todolists/{id}', [TodolistController::class, 'update'])->name('todolists.update');
    Route::delete('/todolists/{id}', [TodolistController::class, 'destroy'])->name('todolists.destroy');

    Route::resource('users', UserController::class);




    Route::get('/password', [UserController::class, 'password'])->name('password');
    Route::post('/password', [UserController::class, 'password_action'])->name('password.action');
});
