<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function showBorrowForm()
    {
        return view('equipment.borrow');
    }
}