<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\AlternativeValue;
use Illuminate\Http\Request;

class AlternativeValueController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::orderBy('alternative_name', 'asc')->get();
        $criterias = Criteria::with('criteriaCode')
            ->join('criteria_codes', 'criteria_codes.id', '=', 'criterias.criteria_code_id')
            ->orderBy('criteria_codes.criteria_code', 'asc')
            ->select('criterias.*')
            ->get();
        $subCriterias = SubCriteria::with('criteriaCode')->get();

        $alternativeValues = AlternativeValue::all()->groupBy(['alternative_id', 'criteria_id']);

        return view('alternative_value.index', compact(
            'alternatives',
            'criterias',
            'subCriterias',
            'alternativeValues'
        ));
    }

    public function bulkUpdate(Request $request)
    {
        foreach ($request->values as $alternative_id => $criterias) {
            foreach ($criterias as $criteria_id => $sub_criteria_id) {
                if ($sub_criteria_id) {
                    AlternativeValue::updateOrCreate(
                        [
                            'alternative_id' => $alternative_id,
                            'criteria_id'    => $criteria_id,
                        ],
                        [
                            'sub_criteria_id' => $sub_criteria_id,
                        ]
                    );
                }
            }
        }

        return redirect()
            ->route('alternative-value.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function smartCalculate()
    {
        $alternatives = Alternative::orderBy('alternative_name')->get();
        $criterias = Criteria::with(['criteriaCode'])->orderBy('criteria_name')->get();

        $cmax = 100;
        $cmin = 0;

        $utilities = [];
        $utilityTimesWeight = [];
        $totals = [];
        $originalValues = [];
        $normalizations = [];
        $weights = [];

        foreach ($criterias as $criteria) {
            $weights[$criteria->id] = $criteria->weight;
        }

        foreach ($alternatives as $alt) {
            $totalUtility = 0;

            foreach ($criterias as $criteria) {
                $altValue = AlternativeValue::where('alternative_id', $alt->id)
                    ->where('criteria_id', $criteria->id)
                    ->first();

                $cout = 0;

                if ($altValue && $altValue->sub_criteria_id) {
                    $subCriteria = SubCriteria::find($altValue->sub_criteria_id);
                    if ($subCriteria) {
                        $cout = $subCriteria->sub_criteria_value;
                    }
                }

                if ($cout > $cmax) {
                    $cout = $cmax;
                }

                // Simpan nilai asli dan normalisasi
                $originalValues[$alt->id][$criteria->id] = $cout;
                $normalizations[$alt->id][$criteria->id] = round($cout / $cmax, 3); // Contoh normalisasi min-max

                // Hitung utility
                $utility = 100 * (($cmax - $cout) / ($cmax - $cmin));
                $utilityTimesWeighting = $criteria->weight * $utility;

                $utilities[$alt->id][$criteria->id] = $utility;
                $utilityTimesWeight[$alt->id][$criteria->id] = $utilityTimesWeighting;

                $totalUtility += $utilityTimesWeighting;
            }

            $totals[$alt->id] = $totalUtility;
        }

        // Urutkan total utility ascending (kecil ke besar)
        asort($totals);

        // Tentukan ranking
        $rankings = [];
        $rank = 1;
        foreach ($totals as $alt_id => $total) {
            $rankings[$alt_id] = $rank++;
        }

        return view('alternative_value.smart_result', compact(
            'alternatives',
            'criterias',
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
