<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(CommonTypeSeeder::class);
        $this->call(WebsiteContentSeeder::class);
        $this->call(OurTeamSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CountryDetailsSeeder::class);
        $this->call(VisaTypeSeeder::class);
        
    }
}
