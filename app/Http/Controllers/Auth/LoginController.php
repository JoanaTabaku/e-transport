<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Check if the user is an admin
        if ($credentials['email'] == 'admin@admin.com' && $credentials['password'] == 'denaldi1234') {
            // Authenticate the admin user
            Auth::guard('admin')->loginUsingId(1); // Assuming the admin user has ID 1
            return redirect()->intended('/admin/dashboard'); // Redirect to the admin dashboard
        }
    
        // If the user is not an admin, proceed with regular authentication
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }    
}
