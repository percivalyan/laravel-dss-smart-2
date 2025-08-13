<?php

namespace App\Http\Controllers;

use App\Models\SubCriteria;
use App\Models\CriteriaCode;
use Illuminate\Http\Request;

class SubCriteriaController extends Controller
{
    public function index()
    {
        $subCriterias = SubCriteria::with('criteriaCode')
            ->join('criteria_codes', 'sub_criterias.criteria_code_id', '=', 'criteria_codes.id')
            ->orderBy('criteria_codes.criteria_code', 'asc')
            ->select('sub_criterias.*')
            ->get();

        $criteriaCodes = CriteriaCode::orderBy('criteria_code')->get();

        return view('sub_criteria.index', compact('subCriterias', 'criteriaCodes'));
    }

    public function bulkUpdate(Request $request)
    {
        $data = $request->input('sub_criteria', []);
        $deleteIds = $request->input('delete_ids', []);

        // 1. Hapus data yang dicentang
        if (!empty($deleteIds)) {
            SubCriteria::whereIn('id', $deleteIds)->delete();
        }

        // 2. Update data yang tidak dihapus
        foreach ($data as $id => $row) {
            // Skip jika datanya masuk ke daftar hapus
            if (in_array($id, $deleteIds)) {
                continue;
            }

            if (isset($row['sub_criteria_name']) && isset($row['sub_criteria_value'])) {
                SubCriteria::where('id', $id)->update([
                    'sub_criteria_name'  => $row['sub_criteria_name'],
                    'sub_criteria_value' => $row['sub_criteria_value'],
                ]);
            }
        }

        return redirect()->route('sub-criteria.index')->with('success', 'Perubahan berhasil disimpan.');
    }

    public function quickStore(Request $request)
    {
        $request->validate([
            'criteria_code_id'   => 'required|exists:criteria_codes,id',
            'sub_criteria_name'  => 'required|string',
            'sub_criteria_value' => 'required|numeric',
        ]);

        SubCriteria::create($request->only('criteria_code_id', 'sub_criteria_name', 'sub_criteria_value'));

        return redirect()->route('sub-criteria.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
