<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\DataTables\UserDataTable;

class UserController extends Controller
{

    public function index(UserDataTable $dataTable)
    {
        $users = User::all();
        return $dataTable->render('admin.users.index');

        // return view('admin.users.index', compact('users'));
    }

    public function datatables(UserDataTable $dataTable)
    {
        return $dataTable->ajax();
    }

    public function create()
    {
        return view('users.create');
    }
    public function show($userId)
    {

        $user = User::find($userId);

        if (!empty($user)) {
            // User found
            return view('admin.users.show', compact('user'));
        } else {
            // User not found
            return abort(404, 'User not found');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:15|egyptian_phone|unique:users',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            ]);

            // Handle photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');

                // Generate a unique name for the photo
                $photoName = time() . '_' . $photo->getClientOriginalName();

                // Store the photo in the 'public/user_photos' directory
                $photoPath = $photo->storeAs('user_photos', $photoName, 'public');
            }

            // Create new user
            User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'photo' => $photoPath,
            ]);

            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {

            // You can redirect back with an error message or perform other error-handling actions
            return redirect()->back()->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:15',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Update user details
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }

            // Handle photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');

                // Generate a unique name for the photo
                $photoName = time() . '_' . $photo->getClientOriginalName();

                // Store the photo in the 'public/user_photos' directory
                $photoPath = $photo->storeAs('user_photos', $photoName, 'public');
                $user->photo = $photoPath;
            }


            $user->save();

            return redirect()->route('users.index')
                ->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error occurred during submission: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
