<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\OpenLabLog; 
use Carbon\Carbon;

class MonitoringController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate(['student_id' => 'required']);
        $studentId = $request->student_id;

        $student = Student::where('student_id', $studentId)->first();

        if (!$student) {
            return back()->with('error', 'Student ID not recognized.');
        }

        $activeLog = OpenLabLog::where('student_id', $studentId)
                                ->whereNull('time_out')
                                ->first();

        if ($activeLog) {
            $activeLog->update(['time_out' => Carbon::now()]);
            $student->increment('total_sessions');
            return back()->with('success', "Goodbye, {$student->first_name}! Session ended.");
        } else {
            if ($student->total_sessions >= 3) {
                return back()->with('error', 'Maximum weekly session limit reached.');
            }

            $assignedPC = 'PC-' . str_pad(rand(1, 40), 2, '0', STR_PAD_LEFT);

            OpenLabLog::create([
                'student_id' => $student->student_id,
                'computer_unit' => $assignedPC,
                'time_in' => Carbon::now(),
                'session_date' => Carbon::today(),
            ]);

            return back()->with([
                'success' => "Welcome, {$student->first_name}!",
                'student' => $student, 
                'pc' => $assignedPC
            ]);
        }
    }
}