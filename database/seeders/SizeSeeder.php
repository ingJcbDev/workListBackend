<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'size' => 'XS',
        ]);
        Size::create([
            'size' => 'S',
        ]);
        Size::create([
            'size' => 'M',
        ]);
        Size::create([
            'size' => 'L',
        ]);
        Size::create([
            'size' => 'XL',
        ]);
        Size::create([
            'size' => 'XXL',
        ]);
    }
}
