<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;

Route::get('/', function () {
    return redirect('/monitoring');
});

Route::get('/monitoring', function () {
    // Points to resources/views/monitoring/index.blade.php
    return view('monitoring.index'); 
});

Route::get('/borrow', [EquipmentController::class, 'showBorrowForm']);