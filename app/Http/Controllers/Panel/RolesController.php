<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('pages.admin.roles.roles', compact('roles'));
    }

    public function show($roleId)
    {
        $role = Role::find($roleId);

        if (!$role) {
            return redirect()->route('admin.roles')->with('error', 'Role not found.');
        }

        return view('pages.admin.roles.single', compact('role'));
    }

    public function new()
    {
        return view('pages.admin.roles.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->except('_token');
        Role::create($data);

        return redirect()->route('admin.roles')->with('success', 'Role created successfully.');
    }

    public function edit($roleId)
    {
        $role = Role::find($roleId);

        if (!$role) {
            return redirect()->route('admin.roles')->with('error', 'Role not found.');
        }

        return view('pages.admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $roleId)
    {
        $role = Role::find($roleId);

        if (!$role) {
            return redirect()->route('admin.roles')->with('error', 'Role not found.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->except('_token');
        $role->update($data);

        return redirect()->route('admin.roles')->with('success', 'Role updated successfully.');
    }

    public function delete($roleId)
    {
        $role = Role::find($roleId);

        if (!$role) {
            return redirect()->route('admin.roles')->with('error', 'Role not found.');
        }

        $role->delete();

        return redirect()->route('admin.roles')->with('success', 'Role deleted successfully.');
    }

}
