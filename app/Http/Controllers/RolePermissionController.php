<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionController extends Controller
{
    // Display the form
    public function showForm()
    {
        $roles = Role::all(); // Fetch all roles
        $permissions = Permission::all(); // Fetch all permissions
        $users = User::all(); // Fetch all users

        return view('admin.create_roles_permissions', compact('roles', 'permissions', 'users'));
    }

    // Create a new role
    public function createRole(Request $request)
    {
        // Validate the request
        $request->validate([
            'role' => 'required|string|unique:roles,name',
        ]);

        // Create the role
        Role::create(['name' => $request->input('role')]);

        return redirect()->route('roles.permissions.form')->with('success', 'Role created successfully!');
    }

    // Create a new permission
    public function createPermission(Request $request)
    {
        // Validate the request
        $request->validate([
            'permission' => 'required|string|unique:permissions,name',
        ]);

        // Create the permission
        Permission::create(['name' => $request->input('permission')]);

        return redirect()->route('roles.permissions.form')->with('success', 'Permission created successfully!');
    }

    public function assignRole(Request $request, User $user)
    {
        $roleId = $request->input('role');
        $role = Role::find($roleId);
    
        if ($role) {
            $user->assignRole($role);
            return redirect()->back()->with('success', 'Role assigned.');
        }
    
        return redirect()->back()->with('error', 'Role not found.');
    }
    
    public function removeRole(Request $request, User $user)
    {
        $roleId = $request->input('role');
        $role = Role::find($roleId);
    
        if ($role) {
            $user->removeRole($role);
            return redirect()->back()->with('success', 'Role removed.');
        }
    
        return redirect()->back()->with('error', 'Role not found.');
    }

}
