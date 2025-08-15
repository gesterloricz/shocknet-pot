<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagingOptionsSeeder extends Seeder
{
    public function run(): void
    {
        $options = [
            ['option_name' => 'Standard Packaging', 'option_code' => 'standard'],
            ['option_name' => 'Bulk Packaging', 'option_code' => 'bulk'],
            ['option_name' => 'Custom Branded Packaging', 'option_code' => 'custom_branded'],
            ['option_name' => 'Individual Wrapping', 'option_code' => 'individual_wrapping'],
        ];

        foreach ($options as $option) {
            DB::table('packaging_options')->updateOrInsert(
                ['option_code' => $option['option_code']],
                [
                    'option_name' => $option['option_name'],
                    'is_active' => true
                ]
            );
        }
    }
}
