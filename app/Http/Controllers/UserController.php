<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();   
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create() {
        $roles = Role::all();
        return view('dashboard.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|unique:users',
            'password' => 'required|string',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        $user->assignRole($request->role);

        return redirect('/dashboard/user')->with('success', 'New user has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string',
            'role' => 'required|exists:roles,name',
        ]);

        // Jika password tidak kosong, encrypt dan masukkan ke dalam array data validasi
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Jika password kosong, hapus dari array validasi agar tidak diupdate
            unset($validatedData['password']);
        }

        // Update data user
        $user->update($validatedData);

        // Sinkronisasi role dengan yang baru
        try {
            $user->syncRoles($request->role);
            Log::info('Assigned Roles:', ['roles' => $user->getRoleNames()->toArray()]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to assign role');
        }

        // Redirect ke halaman user dengan pesan sukses
        return redirect('/dashboard/user')->with('success', 'User has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/user')->with('success', 'Post has been deleted!');
    }
}
