<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return redirect('/monitoring');
});

Route::get('/monitoring', function () {
    return view('monitoring.index');
});

Route::post('/scan', [MonitoringController::class, 'scan'])->name('scan.id');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});