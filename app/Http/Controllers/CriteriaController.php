<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaNonAcademic;
use App\Models\CriteriaCode;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::with('criteriaCode')->orderBy('id')->paginate(10, ['*'], 'academic_page');
        $criteriaNonAcademics = CriteriaNonAcademic::with('criteriaCode')->orderBy('id')->paginate(10, ['*'], 'nonacademic_page');

        return view('criteria.index', compact('criterias', 'criteriaNonAcademics'));
    }

    public function create()
    {
        $criteriaCodes = CriteriaCode::orderBy('criteria_code')->get();
        return view('criteria.create', compact('criteriaCodes'));
    }

    public function createNonAcademic()
    {
        $criteriaCodes = CriteriaCode::orderBy('criteria_code')->get();
        return view('criteria.nonacademic.create', compact('criteriaCodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'criteria_code_id' => 'required|exists:criteria_codes,id',
            'criteria_name'    => 'required|string|max:255',
            'weight'           => 'required|numeric|min:0',
        ]);

        Criteria::create($request->only('criteria_code_id', 'criteria_name', 'weight'));
        return redirect()->route('criteria.index')->with('success', 'Criteria academic berhasil ditambahkan.');
    }

    public function storeNonAcademic(Request $request)
    {
        $request->validate([
            'criteria_code_id' => 'required|exists:criteria_codes,id',
            'criteria_name'    => 'required|string|max:255',
            'weight'           => 'required|numeric|min:0',
        ]);

        CriteriaNonAcademic::create($request->only('criteria_code_id', 'criteria_name', 'weight'));
        return redirect()->route('criteria.index')->with('success', 'Criteria non-academic berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteriaCodes = CriteriaCode::orderBy('criteria_code')->get();
        return view('criteria.edit', compact('criteria', 'criteriaCodes'));
    }

    public function editNonAcademic($id)
    {
        $criteriaNonAcademic = CriteriaNonAcademic::findOrFail($id);
        $criteriaCodes = CriteriaCode::orderBy('criteria_code')->get();
        return view('criteria.nonacademic.edit', compact('criteriaNonAcademic', 'criteriaCodes'));
    }

    public function update(Request $request, $id)
    {
        $criteria = Criteria::findOrFail($id);
        $request->validate([
            'criteria_code_id' => 'required|exists:criteria_codes,id',
            'criteria_name'    => 'required|string|max:255',
            'weight'           => 'required|numeric|min:0',
        ]);

        $criteria->update($request->only('criteria_code_id', 'criteria_name', 'weight'));
        return redirect()->route('criteria.index')->with('success', 'Criteria academic berhasil diperbarui.');
    }

    public function updateNonAcademic(Request $request, $id)
    {
        $criteriaNonAcademic = CriteriaNonAcademic::findOrFail($id);
        $request->validate([
            'criteria_code_id' => 'required|exists:criteria_codes,id',
            'criteria_name'    => 'required|string|max:255',
            'weight'           => 'required|numeric|min:0',
        ]);

        $criteriaNonAcademic->update($request->only('criteria_code_id', 'criteria_name', 'weight'));
        return redirect()->route('criteria.index')->with('success', 'Criteria non-academic berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteria->delete();
        return redirect()->route('criteria.index')->with('success', 'Criteria academic berhasil dihapus.');
    }

    public function destroyNonAcademic($id)
    {
        $criteriaNonAcademic = CriteriaNonAcademic::findOrFail($id);
        $criteriaNonAcademic->delete();
        return redirect()->route('criteria.index')->with('success', 'Criteria non-academic berhasil dihapus.');
    }
}
