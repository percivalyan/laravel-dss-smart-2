<?php

namespace App\Http\Controllers;

use App\Models\CriteriaCode;
use App\Models\SubCriteriaNonAcademic;
use Illuminate\Http\Request;

class SubCriteriaNonAcademicController extends Controller
{
    public function index()
    {
        $subCriteriaNonAcademics = SubCriteriaNonAcademic::with('criteriaCode')
            ->join('criteria_codes', 'sub_criteria_non_academics.criteria_code_id', '=', 'criteria_codes.id')
            ->orderBy('criteria_codes.criteria_code', 'asc')
            ->select('sub_criteria_non_academics.*')
            ->get();

        // Ubah variabel ke 'criteriaCodes' agar sesuai dengan compact()
        $criteriaCodes = CriteriaCode::orderBy('criteria_code')->get();

        return view('sub_criteriana.index', compact('subCriteriaNonAcademics', 'criteriaCodes'));
    }

    public function bulkUpdate(Request $request)
    {
        $dataNonAcademic = $request->input('sub_criteria', []);

        foreach ($dataNonAcademic as $id => $row) {
            if (isset($row['sub_criteria_name']) && isset($row['sub_criteria_value'])) {
                SubCriteriaNonAcademic::where('id', $id)->update([
                    'sub_criteria_name'  => $row['sub_criteria_name'],
                    'sub_criteria_value' => $row['sub_criteria_value'],
                ]);
            }
        }

        return redirect()->route('sub-criteriana.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function quickStore(Request $request)
    {
        $request->validate([
            'criteria_code_id'   => 'required|exists:criteria_codes,id',
            'sub_criteria_name'  => 'required|string',
            'sub_criteria_value' => 'required|numeric',
        ]);

        SubCriteriaNonAcademic::create($request->only('criteria_code_id', 'sub_criteria_name', 'sub_criteria_value'));

        return redirect()->route('sub-criteriana.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
