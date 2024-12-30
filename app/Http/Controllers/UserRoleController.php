<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    // Tampilkan daftar user beserta role mereka
    public function index()
    {
        $users = User::with('roles')->get();
        return view('roles.index', compact('users'));
    }

    // Form untuk mengedit role user
    public function edit(User $user)
    {
        $roles = Role::whereIn('name', ['admin', 'member'])->get(); // Ambil hanya role admin dan member
        return view('roles.edit', compact('user', 'roles'));
    }

    // Simpan perubahan role user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name', // Role harus valid
        ]);

        // Sync role (hapus role sebelumnya, jika ada, dan tambahkan role baru)
        $user->syncRoles([$request->role]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }
}
