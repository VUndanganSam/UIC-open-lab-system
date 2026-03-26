<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    /**
     * Show the pink-themed Admin Login page.
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * Handle the secure authentication process.
     */
    public function login(Request $request)
    {
        // 1. Validate the input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        // 2. Attempt login using the 'admin' guard defined in your config
        if (Auth::guard('admin')->attempt($credentials)) {
            // 3. Prevent Session Fixation attacks (Security Requirement)
            $request->session()->regenerate();

            // 4. Redirect to the Dashboard we built earlier
            return redirect()->intended('/admin/dashboard');
        }

        // 5. If it fails, go back with an error message
        return back()->withErrors([
            'username' => 'Invalid UIC Admin Credentials.',
        ])->withInput($request->only('username'));
    }

    /**
     * Securely terminate the session.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}