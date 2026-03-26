<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\MonitoringController;


Route::get('/', function () {
    return redirect('/monitoring');
});

Route::get('/monitoring', function () {
    // Points to resources/views/monitoring/index.blade.php
    return view('monitoring.index'); 
});

Route::get('/borrow', [EquipmentController::class, 'showBorrowForm']);

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');

Route::get('/admin/reports', function () {
    return view('admin.reports.index');
})->name('admin.reports');

// Admin Login Routes
Route::get('/admin/login', function () { return view('admin.login'); })->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

// Protected Admin Routes (Only accessible if logged in)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () { return view('admin.dashboard.index'); });
    Route::get('/borrow', function () { return view('equipment.borrow'); });
    Route::get('/admin/reports', function () { return view('admin.reports.index'); });
});

// Public Student Route
Route::get('/monitoring', function () { return view('monitoring.index'); });

// Public Routes (Students)
Route::get('/monitoring', function () { return view('monitoring.index'); });

// Login Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

// Protected Admin Dashboard (Only accessible after login)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () { return view('admin.dashboard.index'); });
    Route::get('/borrow', function () { return view('equipment.borrow'); });
    Route::get('/admin/reports', function () { return view('admin.reports.index'); });
});

Route::post('/scan-id', [MonitoringController::class, 'scan'])->name('scan.id');