<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GarmentType;

class GarmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed some colors
        GarmentType::create([
            'description' => 'Vestido',
            'status' => '1',
        ]);

        GarmentType::create([
            'description' => 'Vestido Largo',
            'status' => '1',
        ]);

        GarmentType::create([
            'description' => 'Panty',
            'status' => '1',
        ]);
    }
}
