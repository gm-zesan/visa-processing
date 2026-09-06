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
            ['name' => 'Work Permit & Manpower News'],
            ['name' => 'Saudi Arabia Recruitment'],
            ['name' => 'UAE & Gulf Employment'],
            ['name' => 'Maldives Island Jobs'],
            ['name' => 'Malaysia Calling Visa'],
            ['name' => 'Romania & European Visas'],
            ['name' => 'Embassy & Medical Guidelines'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}
