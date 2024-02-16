<?php

namespace App\Http\Controllers\Panel;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class UsersController extends Controller
{
    public function index()
    {
        // $users = User::orderBy('id', 'desc')->get();
        // return view('pages.admin.users.users', compact('users'));

        $users = User::orderBy('id', 'desc')->paginate(5); // Paginate with 5 users per page
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

}
