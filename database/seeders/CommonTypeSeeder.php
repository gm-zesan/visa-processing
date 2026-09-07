<?php

namespace Database\Seeders;

use App\Models\CommonType;
use Illuminate\Database\Seeder;

class CommonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pageNames = [
            'Home',
            'About',
            'Contact',
            'Admin Setting',
            'Website Setting',
            'Service',
            'Blog',
            'Team',
            'Faq',
            'Country',
            'Visa',
            'Terms of use',
            'Privacy Policy',
        ];

        foreach ($pageNames as $name) {
            CommonType::firstOrCreate(['name' => $name]);
        }
    }
}
