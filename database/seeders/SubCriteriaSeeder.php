<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCriteria;

class SubCriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // C1 - Biaya Pengiriman
            ['criteria_code_id' => 1, 'sub_criteria_name' => 'Biaya pengiriman sangat tinggi dan tidak terjangkau.', 'sub_criteria_value' => 1],
            ['criteria_code_id' => 1, 'sub_criteria_name' => 'Biaya pengiriman tinggi dan dapat memberatkan konsumen.', 'sub_criteria_value' => 2],
            ['criteria_code_id' => 1, 'sub_criteria_name' => 'Biaya pengiriman dalam kisaran tengah, terbilang wajar.', 'sub_criteria_value' => 3],
            ['criteria_code_id' => 1, 'sub_criteria_name' => 'Biaya pengiriman rendah, memberikan nilai ekonomis.', 'sub_criteria_value' => 4],
            ['criteria_code_id' => 1, 'sub_criteria_name' => 'Biaya pengiriman sangat rendah, memberikan keuntungan finansial yang signifikan.', 'sub_criteria_value' => 5],

            // C2 - Kecepatan Pengiriman
            ['criteria_code_id' => 2, 'sub_criteria_name' => 'Pengiriman sangat lambat, melampaui batas waktu yang diharapkan.', 'sub_criteria_value' => 1],
            ['criteria_code_id' => 2, 'sub_criteria_name' => 'Pengiriman lambat, tetapi masih dalam batas waktu yang ditentukan.', 'sub_criteria_value' => 2],
            ['criteria_code_id' => 2, 'sub_criteria_name' => 'Pengiriman dalam waktu yang dapat diterima.', 'sub_criteria_value' => 3],
            ['criteria_code_id' => 2, 'sub_criteria_name' => 'Pengiriman cepat, melebihi harapan konsumen.', 'sub_criteria_value' => 4],
            ['criteria_code_id' => 2, 'sub_criteria_name' => 'Pengiriman sangat cepat, hampir seketika.', 'sub_criteria_value' => 5],

            // C3 - Keamanan Pengiriman
            ['criteria_code_id' => 3, 'sub_criteria_name' => 'Tingkat keamanan sangat rendah, risiko kerusakan atau kehilangan tinggi.', 'sub_criteria_value' => 1],
            ['criteria_code_id' => 3, 'sub_criteria_name' => 'Keamanan pengiriman kurang memuaskan, risiko kerusakan atau kehilangan masih cukup tinggi.', 'sub_criteria_value' => 2],
            ['criteria_code_id' => 3, 'sub_criteria_name' => 'Keamanan pengiriman memadai, risiko kerusakan atau kehilangan terkendali.', 'sub_criteria_value' => 3],
            ['criteria_code_id' => 3, 'sub_criteria_name' => 'Tingkat keamanan tinggi, risiko kerusakan atau kehilangan rendah.', 'sub_criteria_value' => 4],
            ['criteria_code_id' => 3, 'sub_criteria_name' => 'Keamanan pengiriman sangat tinggi, hampir tanpa risiko kerusakan atau kehilangan.', 'sub_criteria_value' => 5],

            // C4 - Pelacakan Pengiriman (Tracking)
            ['criteria_code_id' => 4, 'sub_criteria_name' => 'Sistem pelacakan tidak tersedia atau tidak berfungsi.', 'sub_criteria_value' => 1],
            ['criteria_code_id' => 4, 'sub_criteria_name' => 'Pelacakan pengiriman kurang akurat atau sering mengalami gangguan.', 'sub_criteria_value' => 2],
            ['criteria_code_id' => 4, 'sub_criteria_name' => 'Pelacakan pengiriman dalam kisaran yang dapat diterima.', 'sub_criteria_value' => 3],
            ['criteria_code_id' => 4, 'sub_criteria_name' => 'Pelacakan pengiriman akurat dan dapat diandalkan.', 'sub_criteria_value' => 4],
            ['criteria_code_id' => 4, 'sub_criteria_name' => 'Sistem pelacakan pengiriman sangat canggih dan presisi.', 'sub_criteria_value' => 5],

            // C5 - Ketersediaan Layanan Pick-Up
            ['criteria_code_id' => 5, 'sub_criteria_name' => 'Layanan pick-up tidak tersedia.', 'sub_criteria_value' => 1],
            ['criteria_code_id' => 5, 'sub_criteria_name' => 'Layanan pick-up tersedia.', 'sub_criteria_value' => 2],
        ];

        foreach ($data as $item) {
            SubCriteria::create($item);
        }
    }
}
