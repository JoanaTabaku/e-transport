<?php

namespace App\Http\Controllers\Base;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User; // Assuming your User model is imported

class UserController extends Controller
{
    public function index()
    {
        // This method could be used for any additional functionality related to the UserController
    }

    public function userProfile()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('pages.user.profile.edit', compact('user')); 
    }

    public function editProfile()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('pages.user.profile.edit', compact('user')); 
    }

    public function updateProfile(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
    ]);

    // Update user profile data
    $user = Auth::user();
    $user->update($validatedData);

    // Redirect back to the profile page with a success message
    return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
}

}
