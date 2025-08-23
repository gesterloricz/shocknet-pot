<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('orders', OrdersController::class)
        ->only([
            'index',
            'create',
            'show',
            'edit',
            'update',
            'store'
        ])
        ->parameters([
            'orders' => 'project'
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

    Route::resource('products', ProductsController::class)->only([
        'index'
    ]);

    Route::post('/projects/{project}/update-status', [OrdersController::class, 'updateStatus'])
        ->name('orders.updateStatus');
});
