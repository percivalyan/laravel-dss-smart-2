<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alternative;
use App\Models\CriteriaCode;
use App\Models\SubCriteria;
use App\Models\AlternativeValue;

class AlternativeValueSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping alternatif (by name)
        $alternatives = Alternative::pluck('id', 'alternative_name');

        // Mapping criteria (C1 - C5)
        $criteria = CriteriaCode::pluck('id', 'criteria_code');

        // Data penilaian per alternatif
        $data = [
            'JNE' => [
                'C1' => 3,
                'C2' => 3,
                'C3' => 3,
                'C4' => 4,
                'C5' => 2,
            ],
            'J&T' => [
                'C1' => 4,
                'C2' => 2,
                'C3' => 3,
                'C4' => 4,
                'C5' => 2,
            ],
            'TIKI' => [
                'C1' => 4,
                'C2' => 2,
                'C3' => 3,
                'C4' => 4,
                'C5' => 2,
            ],
            'SiCepat' => [
                'C1' => 2,
                'C2' => 4,
                'C3' => 4,
                'C4' => 5,
                'C5' => 2,
            ],
        ];

        foreach ($data as $altName => $criteriaValues) {
            $alternativeId = $alternatives[$altName];

            foreach ($criteriaValues as $criteriaCode => $subValue) {
                $criteriaId = $criteria[$criteriaCode];

                // Cari sub_criteria_id yang sesuai nilai sub_criteria_value
                $subCriteria = SubCriteria::where('criteria_code_id', $criteriaId)
                    ->where('sub_criteria_value', $subValue)
                    ->first();

                if ($subCriteria) {
                    AlternativeValue::create([
                        'alternative_id' => $alternativeId,
                        'criteria_id' => $criteriaId,
                        'sub_criteria_id' => $subCriteria->id,
                    ]);
                }
            }
        }
    }
}
