<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = array(
            array('id' => '1','name' => 'Theme-1','slug' => 'theme-1','subtitle' => 'subtitle-1','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstr the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available. Wikipedia
            </p>','image' => 'upload/theme/20240330071845.png','light_or_dark' => 'light', 'status' => '1','created_at' => '2024-03-30 07:18:45','updated_at' => '2024-03-30 08:05:08'),
            array('id' => '2','name' => 'Theme-2','slug' => 'theme-2','subtitle' => 'subtitle-2','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstr the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available. Wikipedia
            </p>','image' => 'upload/theme/20240330073935.png','light_or_dark' => 'dark', 'status' => '0','created_at' => '2024-03-30 07:39:35','updated_at' => '2024-03-30 08:05:08'),
        );

        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
