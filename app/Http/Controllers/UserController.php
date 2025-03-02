<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Employee;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        $employeeUserIds = Employee::pluck('user_id');

        $guests = User::where('role_id', 1)
            ->whereNotIn('id', $employeeUserIds)
            ->get();

        $students = User::where('role_id', 2)
            ->whereNotIn('id', $employeeUserIds)
            ->get();
            
        $employees = User::whereIn('id', $employeeUserIds)->get();

        return view('admin.pages.role.index', compact('guests', 'students', 'employees', 'roles'));
    }


    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|integer',
        ]);

        $user = User::findOrFail($id);

        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->back()->with('success', 'Role pengguna berhasil diperbarui!');
    }
}