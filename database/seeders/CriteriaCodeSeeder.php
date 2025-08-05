<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CriteriaCode;

class CriteriaCodeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['criteria_code' => 'C1'],
            ['criteria_code' => 'C2'],
            ['criteria_code' => 'C3'],
            ['criteria_code' => 'C4'],
            ['criteria_code' => 'C5'],
        ];

        foreach ($data as $item) {
            CriteriaCode::create($item);
        }
    }
}
