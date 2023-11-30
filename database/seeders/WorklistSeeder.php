<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Worklist;

class WorklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Worklist::create([
            'referencia' => '0001',
            'garment_type_id' => '1',
            'size_id' => '1',
            'color_id' => '1',
            'fecha_elaboracion' => now(),
            'cantidad_unidades' => '1',
            'observation' => 'Sin novedad',
        ]);
    }
}
