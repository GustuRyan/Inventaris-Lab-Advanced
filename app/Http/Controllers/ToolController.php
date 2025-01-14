<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'tool_name' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        // Simpan data ke database
        $tool = Tool::create($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'tool_name' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        // Temukan Tool berdasarkan ID
        $tool = Tool::findOrFail($id);

        // Update data
        $tool->update($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Temukan Tool berdasarkan ID
        $tool = Tool::findOrFail($id);

        // Hapus data
        $tool->delete();

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil dihapus!');
    }
}