<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'material_name' => 'required|string|max:255',
            'character' => 'nullable|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        // Simpan data ke database
        $material = Material::create($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'material_name' => 'required|string|max:255',
            'character' => 'nullable|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        // Temukan Material berdasarkan ID
        $material = Material::findOrFail($id);

        // Update data
        $material->update($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        // Temukan Material berdasarkan ID
        $material = Material::findOrFail($id);

        // Hapus data
        $material->delete();

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil dihapus!');
    }
}
