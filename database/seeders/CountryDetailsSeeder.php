<?php

namespace Database\Seeders;

use App\Models\CountryDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country_details = array(
            array('id' => '1','country_id' => '50','image' => 'upload/country/20240320082200.jpg','description' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','created_at' => '2024-03-19 09:00:31','updated_at' => '2024-03-20 08:22:00'),
            array('id' => '2','country_id' => '840','image' => 'upload/country/20240320082220.jpg','description' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','created_at' => '2024-03-19 09:14:46','updated_at' => '2024-03-20 08:22:20'),
            array('id' => '3','country_id' => '36','image' => 'upload/country/20240320082245.jpg','description' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>','created_at' => '2024-03-19 09:16:03','updated_at' => '2024-03-20 08:22:45'),
            array('id' => '4','country_id' => '104','image' => 'upload/country/20240320082131.jpg','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>','created_at' => '2024-03-20 08:16:18','updated_at' => '2024-03-20 08:21:31'),
        );

        foreach ($country_details as $country_detail) {
            CountryDetails::create($country_detail);
        }
    }
}
