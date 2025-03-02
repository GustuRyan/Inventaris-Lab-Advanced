<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tool_name' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        $tool = Tool::create($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tool_name' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        $tool = Tool::findOrFail($id);

        $tool->update($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tool = Tool::findOrFail($id);

        $tool->delete();

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil dihapus!');
    }
}