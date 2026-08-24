<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = array(
            array('name' => 'Immigration Visa'),
            array('name' => 'PR VISA'),
            array('name' => 'STUDENT VISA'),
            array('name' => 'WORKING VISA'),
        );

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
