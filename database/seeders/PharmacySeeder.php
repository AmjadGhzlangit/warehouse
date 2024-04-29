<?php

namespace Database\Seeders;

use App\Models\pharmacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pharmacy::factory()->count(10)->create();
    }
}
