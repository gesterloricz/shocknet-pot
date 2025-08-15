<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinishingOptionsSeeder extends Seeder
{
    public function run(): void
    {
        $options = [
            ['option_name' => 'Cutting / Trimming', 'option_code' => 'cutting_trimming'],
            ['option_name' => 'Folding', 'option_code' => 'folding'],
            ['option_name' => 'Lamination', 'option_code' => 'lamination'],
            ['option_name' => 'Varnishing', 'option_code' => 'varnishing'],
            ['option_name' => 'Die-Cutting', 'option_code' => 'die_cutting'],
            ['option_name' => 'Embossing', 'option_code' => 'embossing'],
        ];

        foreach ($options as $option) {
            DB::table('finishing_options')->updateOrInsert(
                ['option_code' => $option['option_code']],
                [
                    'option_name' => $option['option_name'],
                    'is_active' => true
                ]
            );
        }
    }
}
