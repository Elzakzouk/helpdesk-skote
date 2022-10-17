<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainCities = [
            [
                'name' => 'Riyadh',
                'name_ar' => 'الرياض',
                'main' => true
            ],
            [
                'name' => 'Jeddah',
                'name_ar' => 'جده',
                'main' => true
            ],
            [
                'name' => 'Makkah',
                'name_ar' => 'مكة المكرمة',
                'main' => true
            ],
            [
                'name' => 'Madinah',
                'name_ar' => 'المدينة المنورة',
                'main' => true
            ],
            [
                'name' => 'Al-Ahsa',
                'name_ar' => 'الإحساء',
                'main' => true
            ],
            [
                'name' => 'Dammam',
                'name_ar' => 'الدمام',
                'main' => true
            ],
            [
                'name' => 'Al-Khobar',
                'name_ar' => 'الخبر',
                'main' => true
            ],
            [
                'name' => 'Al-Qatif',
                'name_ar' => 'القطيف',
                'main' => true
            ],
            [
                'name' => 'Al-Taif',
                'name_ar' => 'الطائف',
                'main' => true
            ],
            [
                'name' => 'Abha',
                'name_ar' => 'ابها',
                'main' => true
            ],
            [
                'name' => 'Jizan',
                'name_ar' => 'جازان',
                'main' => true
            ],
            [
                'name' => 'Tabouk',
                'name_ar' => 'تبوك',
                'main' => true
            ],
            [
                'name' => 'Najran',
                'name_ar' => 'نجران',
                'main' => true
            ],
            [
                'name' => 'Hail',
                'name_ar' => 'حائل',
                'main' => true
            ],
            [
                'name' => 'Al-Baha',
                'name_ar' => 'الباحة',
                'main' => true
            ],
            [
                'name' => 'Buraidah',
                'name_ar' => 'بريدة',
                'main' => true
            ],
            [
                'name' => 'Unaizah',
                'name_ar' => 'عنيزة',
                'main' => true
            ],
            [
                'name' => 'Khamis Mushait',
                'name_ar' => 'خميس مشيط',
                'main' => true
            ],
            [
                'name' => 'Sakakah',
                'name_ar' => 'سكاكا',
                'main' => true
            ],
            [
                'name' => 'Arar',
                'name_ar' => 'عرعر',
                'main' => true
            ],
        ];



        foreach($mainCities as $key => $city) {
            DB::table('cities')->insert([
                'name' => $city['name'],
                'name_ar' => $city['name_ar'],
                'main' => $city['main'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
