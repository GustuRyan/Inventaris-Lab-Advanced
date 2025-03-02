<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'material_name' => 'required|string|max:255',
            'character' => 'nullable|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        $material = Material::create($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'material_name' => 'required|string|max:255',
            'character' => 'nullable|string|max:255',
            'condition' => 'nullable|string|max:255',
            'in_date' => 'required|date',
        ]);

        $material = Material::findOrFail($id);

        $material->update($validatedData);

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        $material = Material::findOrFail($id);

        $material->delete();

        return redirect()->route('admin.alat-bahan.index')->with('success', 'Material berhasil dihapus!');
    }
}
