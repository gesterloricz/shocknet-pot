<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('orders', OrdersController::class)->only([
        'index',
        'create',
        'show',
        'edit',
        'store'
    ]);

    Route::resource('clients', ClientsController::class)->only([
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy'
    ]);

    Route::resource('reports', ReportsController::class)->only([
        'index'
    ]);
});
