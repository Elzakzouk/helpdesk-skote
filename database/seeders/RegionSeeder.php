<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'name' => 'Central',
                'name_ar' => 'المنطقة الوسطى'
            ],
            [
                'name' => 'Eastern',
                'name_ar' => 'المنطقة الشرقية'
            ],
            [
                'name' => 'Western',
                'name_ar' => 'المنطقة الغربية'
            ],
            [
                'name' => 'Northern',
                'name_ar' => 'المنطقة الشمالية'
            ],
            [
                'name' => 'Southern',
                'name_ar' => 'المنطقة الجنوبية'
            ],
        ];

        foreach($regions as $region) {
            DB::table('regions')->insert([
                'name' => $region['name'],
                'name_ar' => $region['name_ar'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
