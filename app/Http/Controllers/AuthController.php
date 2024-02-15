<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('user.dashboard'); // Or 'admin.dashboard' depending on the user's role
        }
        return view('auth.login');
    }

    // Handle login form submission
    // fix this method
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('user.dashboard'); // Or 'admin.dashboard' depending on the user's role
        }
        return view('auth.register');
    }

    // Handle register form submission
    public function register(Request $request)
    {
        // Validation rules
        $rules = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required', // Assuming you have a field named 'role' in your registration form
        ];

        // Run validation
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, create a new user
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role_id' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // You may want to authenticate the user after registration.
        // Uncomment the next line if you want to auto-login the user after registration.
        // Auth::login($user);

        // Redirect the user to a success page or any other page
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');

    }


    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->with('success', 'You have been logged out.');
}


}
