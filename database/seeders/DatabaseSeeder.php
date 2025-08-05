<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CriteriaCodeSeeder::class,
            CriteriaSeeder::class,
            SubCriteriaSeeder::class,
            AlternativeSeeder::class,
            AlternativeValueSeeder::class,
        ]);
    }
}
