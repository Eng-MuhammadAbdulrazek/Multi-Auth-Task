<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{   
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions/index', compact('permissions'));
    }

    public function store(Permission $request)
    {
        try {
            $Permission = new Permission();
            $Permission->name = $request->name;
            $Permission->slug = $request->slug;
            $Permission->save();
            return redirect()->route('permissions.index')->with('success', 'Permission Added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $Permission)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:20',
                'slug' => 'required|string|max:20',
            ]);
            // Update role details
            $Permission->name = $request->name;
            $Permission->slug = $request->slug;

            $Permission->save();

            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }

    public function destroy($Permission)
    {
        try {
            $p = Permission::find($Permission);
                $p->delete();
                return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }
}
