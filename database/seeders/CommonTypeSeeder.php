<?php

namespace Database\Seeders;

use App\Models\CommonType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $common_types = array(
            array('id' => '1','name' => 'Home','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','image' => 'upload/common-type/20240309070825.jpg','created_at' => '2024-03-16 07:15:50','updated_at' => '2024-03-16 07:15:50'),
            array('id' => '2','name' => 'About','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','image' => NULL,'created_at' => '2024-03-16 07:15:50','updated_at' => '2024-03-16 07:15:50'),
            array('id' => '3','name' => 'Contact','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','image' => NULL,'created_at' => '2024-03-16 07:15:50','updated_at' => '2024-03-16 07:15:50'),
            array('id' => '4','name' => 'Admin Setting','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','image' => NULL,'created_at' => '2024-03-16 07:15:50','updated_at' => '2024-03-16 07:15:50'),
            array('id' => '5','name' => 'Website Setting','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','image' => NULL,'created_at' => '2024-03-16 07:15:50','updated_at' => '2024-03-16 07:15:50'),
            array('id' => '6','name' => 'Service','description' => NULL,'image' => NULL,'created_at' => '2024-03-16 08:28:26','updated_at' => '2024-03-16 08:28:26'),
            array('id' => '7','name' => 'Blog','description' => NULL,'image' => NULL,'created_at' => '2024-03-16 08:28:26','updated_at' => '2024-03-16 08:28:26'),
            array('id' => '8','name' => 'Team','description' => NULL,'image' => NULL,'created_at' => '2024-03-16 08:28:26','updated_at' => '2024-03-16 08:28:26'),
            array('id' => '9','name' => 'Faq','description' => NULL,'image' => NULL,'created_at' => '2024-03-16 08:28:26','updated_at' => '2024-03-16 08:28:26'),
            array('id' => '10','name' => 'Country','description' => NULL,'image' => NULL,'created_at' => '2024-03-18 05:43:05','updated_at' => '2024-03-18 05:43:05'),
            array('id' => '11','name' => 'Visa','description' => NULL,'image' => NULL,'created_at' => '2024-03-18 07:12:02','updated_at' => '2024-03-18 07:12:02'),
            array('id' => '12','name' => 'Terms of use','description' => NULL,'image' => NULL,'created_at' => '2024-03-25 04:58:02','updated_at' => '2024-03-25 04:58:02'),
            array('id' => '13','name' => 'Privacy Policy','description' => NULL,'image' => NULL,'created_at' => '2024-03-25 05:12:36','updated_at' => '2024-03-25 05:12:36'),
            array('id' => '14','name' => 'Cookie Policy','description' => NULL,'image' => NULL,'created_at' => '2024-03-25 05:22:36','updated_at' => '2024-03-25 05:22:36'),
            array('id' => '15','name' => 'Help Center','description' => NULL,'image' => NULL,'created_at' => '2024-03-25 06:18:20','updated_at' => '2024-03-25 06:18:20')
        );

        foreach ($common_types as $common_type) {
            CommonType::create($common_type);
        }
    }
}
