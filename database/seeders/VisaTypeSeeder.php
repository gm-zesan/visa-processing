<?php

namespace Database\Seeders;

use App\Models\VisaType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visa_types = array(
            array('id' => '1','country_details_id' => '1','name' => 'Tourist & Visitor Visas','slug' => 'tourist-visitor-visas','description' => '<p>Hay is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
            
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','image' => 'upload/visa_type/20240319091455.jpg','created_at' => '2024-03-19 09:00:31','updated_at' => '2024-03-19 09:16:53'),
            array('id' => '2','country_details_id' => '2','name' => 'Immigration Visa','slug' => 'immigration-visa','description' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','image' => 'upload/visa_type/20240319091747.jpg','created_at' => '2024-03-19 09:14:46','updated_at' => '2024-03-19 09:17:47'),
            array('id' => '3','country_details_id' => '3','name' => 'Student Visa','slug' => 'student-visa','description' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','image' => 'upload/visa_type/20240319091731.jpg','created_at' => '2024-03-19 09:16:03','updated_at' => '2024-03-19 09:17:31'),
        );
        // $visa_types = array(
        //     array('id' => '1','country_details_id' => '50','name' => 'Tourist & Visitor Visas','slug' => 'tourist-visitor-visas','description' => '<p>Hay is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>
            
        //     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','image' => 'upload/visa_type/20240319091455.jpg','created_at' => '2024-03-19 09:00:31','updated_at' => '2024-03-19 09:16:53'),
        //     array('id' => '2','country_details_id' => '840','name' => 'Immigration Visa','slug' => 'immigration-visa','description' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','image' => 'upload/visa_type/20240319091747.jpg','created_at' => '2024-03-19 09:14:46','updated_at' => '2024-03-19 09:17:47'),
        //     array('id' => '3','country_details_id' => '36','name' => 'Student Visa','slug' => 'student-visa','description' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','image' => 'upload/visa_type/20240319091731.jpg','created_at' => '2024-03-19 09:16:03','updated_at' => '2024-03-19 09:17:31'),
        // );

        foreach ($visa_types as $visa_type) {
            VisaType::create($visa_type);
        }
    }
}
