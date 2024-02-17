<?php

namespace App\Http\Controllers\Base;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        // This method could be used for any additional functionality related to the AdminController
    }

    public function adminProfile()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('pages.admin.profile.edit', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('pages.admin.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
        ]);

        // Check if the new password is provided
        if ($request->filled('new_password')) {
            $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:8|confirmed',
            ]);

            // Check if the current password matches the authenticated user's password
            if (!Hash::check($request->current_password, Auth::user()->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            // Update the password
            $validatedData['password'] = Hash::make($request->new_password);
        }

        // Update user profile data
        $user = Auth::user();
        $user->update($validatedData);

        // Redirect back to the profile page with a success message
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }
}
