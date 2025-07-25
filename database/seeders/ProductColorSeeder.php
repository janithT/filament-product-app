<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductColor;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Red',    'description' => 'Bright red',    'hex_code' => '#FF0000'],
            ['name' => 'Green',  'description' => 'Fresh green',   'hex_code' => '#00FF00'],
            ['name' => 'Blue',   'description' => 'Deep blue',     'hex_code' => '#0000FF'],
        ];

        foreach ($colors as $color) {
            ProductColor::updateOrCreate(
                ['name' => $color['name']], 
                [
                    'description' => $color['description'],
                    'hex_code'    => $color['hex_code'],
                ]
            );
        }
    }
}
