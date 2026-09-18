<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Work Permit & Manpower News', 'name_bn' => 'ওয়ার্ক পারমিট এবং ম্যানপাওয়ার নিউজ'],
            ['name' => 'Saudi Arabia Recruitment', 'name_bn' => 'সৌদি আরব রিক্রুটমেন্ট'],
            ['name' => 'UAE & Gulf Employment', 'name_bn' => 'ইউএই এবং গালফ এমপ্লয়মেন্ট'],
            ['name' => 'Maldives Island Jobs', 'name_bn' => 'মালদ্বীপ আইল্যান্ড জবস'],
            ['name' => 'Malaysia Calling Visa', 'name_bn' => 'মালয়েশিয়া কলিং ভিসা'],
            ['name' => 'Romania & European Visas', 'name_bn' => 'রোমানিয়া এবং ইউরোপিয়ান ভিসা'],
            ['name' => 'Embassy & Medical Guidelines', 'name_bn' => 'দূতাবাস এবং মেডিকেল গাইডলাইনস'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}
