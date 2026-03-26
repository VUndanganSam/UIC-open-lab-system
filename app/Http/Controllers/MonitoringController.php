<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\OpenLabLog; 
use Carbon\Carbon; // Clean import

class MonitoringController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate(['student_id' => 'required']);
        $studentId = $request->student_id;

        // 1. Check if student exists
        $student = Student::where('student_id', $studentId)->first();

        if (!$student) {
            return back()->with('error', 'Student ID not recognized in UIC Database.');
        }

        // 2. Check for an active session (Time-out is null)
        $activeLog = OpenLabLog::where('student_id', $studentId)
                                ->whereNull('time_out')
                                ->first();

        if ($activeLog) {
            // --- LOGOUT LOGIC ---
            $activeLog->update([
                'time_out' => Carbon::now() // Simplified call
            ]);
            
            // Increment the session count upon successful completion
            $student->increment('total_sessions');

            return back()->with('success', "Goodbye, {$student->first_name}! Your session has been logged.");
        } else {
            // --- LOGIN LOGIC ---
            
            // 3. Enforce the 3-session policy (Ma'am Shen's requirement)
            if ($student->total_sessions >= 3) {
                return back()->with('error', 'Access Denied: You have reached the 3-session weekly limit.');
            }

            // 4. Randomized PC Assignment (PC-01 to PC-40)
            $assignedPC = 'PC-' . str_pad(rand(1, 40), 2, '0', STR_PAD_LEFT);

            // 5. Create the entry
            OpenLabLog::create([
                'student_id'    => $student->student_id,
                'computer_unit' => $assignedPC,
                'time_in'       => Carbon::now(),
                'session_date'  => Carbon::today(),
            ]);

            // 6. Return with the 'student' and 'pc' keys for the Neon UI
            return back()->with([
                'success' => "Welcome to the Lab, {$student->first_name}!",
                'student' => $student, 
                'pc'      => $assignedPC
            ]);
        }
    }
}