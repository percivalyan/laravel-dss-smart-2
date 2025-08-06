<?php

namespace App\Http\Controllers;

use App\Models\AlternativeNonAcademic;
use App\Models\CriteriaNonAcademic;
use App\Models\SubCriteriaNonAcademic;
use App\Models\AlternativeValueNonAcademic;
use Illuminate\Http\Request;

class AlternativeValueNonAcademicController extends Controller
{
    public function index()
    {
        $alternativeNonAcademics = AlternativeNonAcademic::orderBy('alternative_name', 'asc')->get();

        $criteriaNonAcademics = CriteriaNonAcademic::with('criteriaCode')
            ->join('criteria_codes', 'criteria_codes.id', '=', 'criteria_non_academics.criteria_code_id')
            ->orderBy('criteria_codes.criteria_code', 'asc')
            ->select('criteria_non_academics.*')
            ->get();

        $subCriteriaNonAcademics = SubCriteriaNonAcademic::with('criteriaCode')->get();

        $alternativeValueNonAcademics = AlternativeValueNonAcademic::all()
            ->groupBy(['alternative_non_academic_id', 'criteria_non_academic_id']);

        return view('alternative_valuena.index', compact(
            'alternativeNonAcademics',
            'criteriaNonAcademics',
            'subCriteriaNonAcademics',
            'alternativeValueNonAcademics'
        ));
    }

    public function bulkUpdate(Request $request)
    {
        foreach ($request->values as $alternative_id => $criterias) {
            foreach ($criterias as $criteria_id => $sub_criteria_id) {
                if ($sub_criteria_id) {
                    AlternativeValueNonAcademic::updateOrCreate(
                        [
                            'alternative_non_academic_id' => $alternative_id,
                            'criteria_non_academic_id'    => $criteria_id,
                        ],
                        [
                            'sub_criteria_non_academic_id' => $sub_criteria_id,
                        ]
                    );
                }
            }
        }

        return redirect()
            ->route('alternative-valuena.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function smartCalculate()
    {
        $alternativeNonAcademics = AlternativeNonAcademic::orderBy('alternative_name')->get();
        $criteriaNonAcademics = CriteriaNonAcademic::with('criteriaCode')->orderBy('criteria_name')->get();

        $cmax = 100;
        $cmin = 0;

        $utilities = [];
        $utilityTimesWeight = [];
        $totals = [];
        $originalValues = [];
        $normalizations = [];
        $weights = [];

        foreach ($criteriaNonAcademics as $criteria) {
            $weights[$criteria->id] = $criteria->weight;
        }

        foreach ($alternativeNonAcademics as $alt) {
            $totalUtility = 0;

            foreach ($criteriaNonAcademics as $criteria) {
                $altValue = AlternativeValueNonAcademic::where('alternative_non_academic_id', $alt->id)
                    ->where('criteria_non_academic_id', $criteria->id)
                    ->first();

                $cout = 0;

                if ($altValue && $altValue->sub_criteria_non_academic_id) {
                    $subCriteria = SubCriteriaNonAcademic::find($altValue->sub_criteria_non_academic_id);
                    if ($subCriteria) {
                        $cout = $subCriteria->sub_criteria_value;
                    }
                }

                if ($cout > $cmax) {
                    $cout = $cmax;
                }

                $originalValues[$alt->id][$criteria->id] = $cout;
                $normalizations[$alt->id][$criteria->id] = round($cout / $cmax, 3);

                $utility = 100 * (($cmax - $cout) / ($cmax - $cmin));
                $utilityTimesWeighting = $criteria->weight * $utility;

                $utilities[$alt->id][$criteria->id] = $utility;
                $utilityTimesWeight[$alt->id][$criteria->id] = $utilityTimesWeighting;

                $totalUtility += $utilityTimesWeighting;
            }

            $totals[$alt->id] = $totalUtility;
        }

        asort($totals);

        $rankings = [];
        $rank = 1;
        foreach ($totals as $alt_id => $total) {
            $rankings[$alt_id] = $rank++;
        }

        return view('alternative_valuena.smart_result', compact(
            'alternativeNonAcademics',
            'criteriaNonAcademics',
            'utilities',
            'utilityTimesWeight',
            'totals',
            'rankings',
            'originalValues',
            'normalizations',
            'weights'
        ));
    }
}
