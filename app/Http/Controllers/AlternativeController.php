<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeNonAcademic;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::orderBy('id')->paginate(10, ['*'], 'academic_page');
        $alternativeNonAcademics = AlternativeNonAcademic::orderBy('id')->paginate(10, ['*'], 'nonacademic_page');

        return view('alternative.index', compact('alternatives', 'alternativeNonAcademics'));
    }

    public function create()
    {
        return view('alternative.create');
    }

    public function createNonAcademic()
    {
        return view('alternative.nonacademic.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alternative_code' => 'required|unique:alternatives,alternative_code',
            'alternative_name' => 'nullable|string|max:255',
        ]);

        Alternative::create($request->only('alternative_code', 'alternative_name'));
        return redirect()->route('alternative.index')->with('success', 'Alternative academic berhasil ditambahkan.');
    }

    public function storeNonAcademic(Request $request)
    {
        $request->validate([
            'alternative_code' => 'required|unique:alternative_non_academics,alternative_code',
            'alternative_name' => 'nullable|string|max:255',
        ]);

        AlternativeNonAcademic::create($request->only('alternative_code', 'alternative_name'));
        return redirect()->route('alternative.index')->with('success', 'Alternative non-academic berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternative = Alternative::findOrFail($id);
        return view('alternative.edit', compact('alternative'));
    }

    public function editNonAcademic($id)
    {
        $alternativeNonAcademic = AlternativeNonAcademic::findOrFail($id);
        return view('alternative.nonacademic.edit', compact('alternativeNonAcademic'));
    }

    public function update(Request $request, $id)
    {
        $alternative = Alternative::findOrFail($id);

        $request->validate([
            'alternative_code' => 'required|unique:alternatives,alternative_code,' . $alternative->id,
            'alternative_name' => 'nullable|string|max:255',
        ]);

        $alternative->update($request->only('alternative_code', 'alternative_name'));
        return redirect()->route('alternative.index')->with('success', 'Alternative academic berhasil diperbarui.');
    }

    public function updateNonAcademic(Request $request, $id)
    {
        $alternativeNonAcademic = AlternativeNonAcademic::findOrFail($id);

        $request->validate([
            'alternative_code' => 'required|unique:alternative_non_academics,alternative_code,' . $alternativeNonAcademic->id,
            'alternative_name' => 'nullable|string|max:255',
        ]);

        $alternativeNonAcademic->update($request->only('alternative_code', 'alternative_name'));
        return redirect()->route('alternative.index')->with('success', 'Alternative non-academic berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alternative = Alternative::findOrFail($id);
        $alternative->delete();
        return redirect()->route('alternative.index')->with('success', 'Alternative academic berhasil dihapus.');
    }

    public function destroyNonAcademic($id)
    {
        $alternativeNonAcademic = AlternativeNonAcademic::findOrFail($id);
        $alternativeNonAcademic->delete();
        return redirect()->route('alternative.index')->with('success', 'Alternative non-academic berhasil dihapus.');
    }
}
