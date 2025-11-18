<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.admin.index', compact('data'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.manage.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $data->update($updateData);

        return redirect()->route('admin.manage.index')->with('success', 'Admin berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Prevent deleting yourself
        if ($id == auth()->id()) {
            return redirect()->route('admin.manage.index')->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.manage.index')->with('success', 'Admin berhasil dihapus');
    }
}

