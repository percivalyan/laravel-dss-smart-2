<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alternative;
use App\Models\AlternativeNonAcademic;
use App\Models\AlternativeValue;
use App\Models\AlternativeValueNonAcademic;
use App\Models\Criteria;
use App\Models\CriteriaNonAcademic;
use App\Models\SubCriteria;
use App\Models\SubCriteriaNonAcademic;
use App\Models\CriteriaCode;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalAlternatives = Alternative::count();
        $totalAlternativesNonAcademic = AlternativeNonAcademic::count();

        $totalAlternativeValues = AlternativeValue::count();
        $totalAlternativeValuesNonAcademic = AlternativeValueNonAcademic::count();

        $totalCriterias = Criteria::count();
        $totalCriteriasNonAcademic = CriteriaNonAcademic::count();

        $totalSubCriterias = SubCriteria::count();
        $totalSubCriteriasNonAcademic = SubCriteriaNonAcademic::count();

        $totalCriteriaCodes = CriteriaCode::count();

        return view('dashboard', compact(
            'totalAlternatives',
            'totalAlternativesNonAcademic',
            'totalAlternativeValues',
            'totalAlternativeValuesNonAcademic',
            'totalCriterias',
            'totalCriteriasNonAcademic',
            'totalSubCriterias',
            'totalSubCriteriasNonAcademic',
            'totalCriteriaCodes'
        ));
    }
}
