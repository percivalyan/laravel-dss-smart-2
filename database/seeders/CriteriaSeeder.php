<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'criteria_code_id' => 1, // C1
                'criteria_name'    => 'Biaya Pengiriman',
                'weight'           => 0.3
            ],
            [
                'criteria_code_id' => 2, // C2
                'criteria_name'    => 'Kecepatan Pengiriman',
                'weight'           => 0.25
            ],
            [
                'criteria_code_id' => 3, // C3
                'criteria_name'    => 'Keamanan Pengiriman',
                'weight'           => 0.2
            ],
            [
                'criteria_code_id' => 4, // C4
                'criteria_name'    => 'Pelacakan Pengiriman (Tracking)',
                'weight'           => 0.15
            ],
            [
                'criteria_code_id' => 5, // C5
                'criteria_name'    => 'Ketersediaan Layanan Pick-Up',
                'weight'           => 0.1
            ],
        ];

        foreach ($data as $item) {
            Criteria::create($item);
        }
    }
}
