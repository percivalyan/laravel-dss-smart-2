<?php

namespace App\Http\Controllers;

use App\Models\CriteriaCode;
use Illuminate\Http\Request;

class CriteriaCodeController extends Controller
{
    public function index()
    {
        $criteriaCodes = CriteriaCode::paginate(10);
        return view('criteria_code.index', compact('criteriaCodes'));
    }

    public function create()
    {
        return view('criteria_code.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'criteria_code' => 'required|unique:criteria_codes,criteria_code',
        ]);

        CriteriaCode::create($request->only('criteria_code'));
        return redirect()->route('criteria-code.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $criteriaCode = CriteriaCode::findOrFail($id);
        return view('criteria_code.edit', compact('criteriaCode'));
    }

    public function update(Request $request, $id)
    {
        $criteriaCode = CriteriaCode::findOrFail($id);

        $request->validate([
            'criteria_code' => 'required|unique:criteria_codes,criteria_code,' . $criteriaCode->id,
        ]);

        $criteriaCode->update($request->only('criteria_code'));
        return redirect()->route('criteria-code.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $criteriaCode = CriteriaCode::findOrFail($id);
        $criteriaCode->delete();

        return redirect()->route('criteria-code.index')->with('success', 'Data berhasil dihapus.');
    }
}
