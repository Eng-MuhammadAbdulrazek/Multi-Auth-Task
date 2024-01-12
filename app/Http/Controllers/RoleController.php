<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.roles/index', compact('roles','users'));
    }

    public function AssignRoleToUser(Request $request){

        try{
            $role = Role::find($request->role);
            $user = User::find($request->user);

            $user->roles()->detach();
            $user->roles()->attach($role);

            return redirect()->route('roles.index')->with('success', 'Role Assigned successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }


    }

    public function store(Request $request)
    {
        try {
            $role = new Role();
            $role->name = $request->name;
            $role->slug = $request->slug;
            $role->save();
            return redirect()->route('roles.index')->with('success', 'Role Added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:20',
                'slug' => 'required|string|max:20',
            ]);
            // Update role details
            $role->name = $request->name;
            $role->slug = $request->slug;

            $role->save();

            return redirect()->route('roles.index')->with('success', 'Role updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }

    public function destroy($role)
    {
        try {
            $r = Role::find($role);
            $permsissionsAttached = $r->permissions();
            if ($permsissionsAttached->count() == 0) {
                $r->delete();
                return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }
}
