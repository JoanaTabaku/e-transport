<?php

namespace App\Http\Controllers\Panel;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            return $this->searchUsers($request);
        }
    
        $users = User::orderBy('id', 'asc')->paginate(5);
        return view('pages.admin.users.users', compact('users'));
    }

    public function show($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }

        return view('pages.admin.users.single', compact('user'));
    }

    public function new()
    {
        $roles = Role::all();
        return view('pages.admin.users.new', compact('roles'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        $roles = Role::all();

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }

        return view('pages.admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'email' => 'required|email|unique:users,email,' . $userId
            // 'password' => 'nullable|string|min:8',
        ]);

        $data = $request->except('_token');

        // if ($data['password']) {
        //     $data['password'] = bcrypt($data['password']);
        // } else {
        //     unset($data['password']);
        // }

        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');

    }

    public function delete($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function searchUsers(Request $request)
    {
        $search = $request->input('search');
    
        $users = User::where('firstname', 'like', '%' . $search . '%')
                     ->orWhere('lastname', 'like', '%' . $search . '%')
                     ->orWhere('email', 'like', '%' . $search . '%')
                     ->orderBy('id', 'desc')
                     ->paginate(5);
    
        // Preserve the search query in the pagination links
        $users->appends(['search' => $search]);
    
        return view('pages.admin.users.users', compact('users'));
    }
    
    public function clearSearch()
{
    // Redirect to the index page without the search parameter
    return redirect()->route('admin.users');
}

}
