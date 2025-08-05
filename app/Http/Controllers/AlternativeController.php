<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::paginate(10);
        return view('alternative.index', compact('alternatives'));
    }

    public function create()
    {
        return view('alternative.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alternative_code' => 'required|unique:alternatives,alternative_code',
            'alternative_name' => 'nullable|string|max:255',
        ]);

        Alternative::create($request->only('alternative_code', 'alternative_name'));
        return redirect()->route('alternative.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternative = Alternative::findOrFail($id);
        return view('alternative.edit', compact('alternative'));
    }

    public function update(Request $request, $id)
    {
        $alternative = Alternative::findOrFail($id);

        $request->validate([
            'alternative_code' => 'required|unique:alternatives,alternative_code,' . $alternative->id,
            'alternative_name' => 'nullable|string|max:255',
        ]);

        $alternative->update($request->only('alternative_code', 'alternative_name'));
        return redirect()->route('alternative.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alternative = Alternative::findOrFail($id);
        $alternative->delete();

        return redirect()->route('alternative.index')->with('success', 'Data berhasil dihapus.');
    }
}
