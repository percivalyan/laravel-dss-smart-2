<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alternative;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatives = [
            ['alternative_code' => 'A1', 'alternative_name' => 'JNE'],
            ['alternative_code' => 'A2', 'alternative_name' => 'J&T'],
            ['alternative_code' => 'A3', 'alternative_name' => 'TIKI'],
            ['alternative_code' => 'A4', 'alternative_name' => 'SiCepat'],
        ];

        foreach ($alternatives as $alternative) {
            Alternative::create($alternative);
        }
    }
}
