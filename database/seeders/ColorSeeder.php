<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed some colors
        Color::create([
            'description' => 'Rojo',
            'status' => '1',
        ]);

        Color::create([
            'description' => 'Verde',
            'status' => '1',
        ]);

        Color::create([
            'description' => 'Azul',
            'status' => '1',
        ]);
    }
}
