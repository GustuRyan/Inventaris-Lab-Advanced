<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {

        $user = User::findOrFail(auth()->id());

        if ($user->role_id == 4) {
            $rooms = Room::where('faculty_name', $user->room->faculty_name)->get();

            $employees = collect();

            foreach ($rooms as $key => $room) {
                $employee = Employee::where('room_id', $room->id);

                $employees = $employees->merge($employee);
            }
        } else {
            $employees = Employee::all();
        }

        return view('admin.pages.employee.index', compact('employees'));
    }

    public function create()
    {
        $rooms = Room::all();
        $users = User::whereNotIn('id', Employee::pluck('user_id'))->get();

        return view('admin.pages.employee.create', compact('rooms', 'users'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'employee_name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'room_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        // Simpan data ke database
        $employee = Employee::create($validatedData);

        return redirect()->route('admin.pegawai.index')->with('success', 'Material berhasil ditambahkan!');
    }

    public function edit(Employee $employee)
    {
        $rooms = Room::all();
        $users = User::all();

        return view('admin.pages.employee.update', compact('employee', 'rooms', 'users'));
    }

    public function update(Request $request, Employee $id)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'employee_name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'room_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        // Update data
        $id->update($validatedData);
        return redirect()->route('admin.pegawai.index')->with('success', 'Material berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('admin.pegawai.index')->with('success', 'Material berhasil dihapus!');
    }
}
