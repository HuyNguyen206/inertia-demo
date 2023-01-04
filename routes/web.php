<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('guest')->get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::middleware('guest')->post('login', [\App\Http\Controllers\Auth\LoginController::class, 'handle']);

Route::middleware('auth')->group(function (){
    Route::get('', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::inertia('/users/create', 'Users/Create')->can('createUser', \App\Models\User::class)->name('users.create');
    Route::get('/users/edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])
        ->can('editUser', 'App\Models\User')
        ->name('users.edit');

    Route::put('/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])
        ->can('editUser', 'App\Models\User')
        ->name('users.update');

    Route::post('/users',[\App\Http\Controllers\UserController::class, 'store'])->name('users.store');

    Route::post('logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
