<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            [
                'id' => 1,
                'name' => 'Royal Gold & Navy (Official)',
                'slug' => 'royal-gold-navy',
                'primary_color' => '#C59A27',
                'secondary_color' => '#111A3A',
                'hover_color' => '#A87F17',
                'light_color' => '#FBF6EA',
                'nav_bg' => '#FFFFFF',
                'footer_bg' => '#111A3A',
                'description' => 'Official AL FAHIM INTERNATIONAL branding palette matching the corporate eagle logo.',
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Emerald Green & Slate',
                'slug' => 'emerald-green-slate',
                'primary_color' => '#16A34A',
                'secondary_color' => '#0F172A',
                'hover_color' => '#15803D',
                'light_color' => '#F0FDF4',
                'nav_bg' => '#FFFFFF',
                'footer_bg' => '#0F172A',
                'description' => 'Fresh, prestigious botanical green theme ideal for global mobility and welfare.',
                'status' => 0,
            ],
            [
                'id' => 3,
                'name' => 'Sapphire Blue & Steel',
                'slug' => 'sapphire-blue-steel',
                'primary_color' => '#2563EB',
                'secondary_color' => '#0B192C',
                'hover_color' => '#1D4ED8',
                'light_color' => '#EFF6FF',
                'nav_bg' => '#FFFFFF',
                'footer_bg' => '#0B192C',
                'description' => 'Modern corporate international aviation blue with deep midnight accents.',
                'status' => 0,
            ],
            [
                'id' => 4,
                'name' => 'Crimson & Charcoal',
                'slug' => 'crimson-charcoal',
                'primary_color' => '#DC2626',
                'secondary_color' => '#18181B',
                'hover_color' => '#B91C1C',
                'light_color' => '#FEF2F2',
                'nav_bg' => '#FFFFFF',
                'footer_bg' => '#18181B',
                'description' => 'High-energy, authoritative red and deep charcoal for high-impact presence.',
                'status' => 0,
            ],
            [
                'id' => 5,
                'name' => 'Amber Bronze & Espresso',
                'slug' => 'amber-bronze-espresso',
                'primary_color' => '#D97706',
                'secondary_color' => '#1C1917',
                'hover_color' => '#B45309',
                'light_color' => '#FFFBEB',
                'nav_bg' => '#FFFFFF',
                'footer_bg' => '#1C1917',
                'description' => 'Warm luxury bronze and rich espresso designed for executive recruitment.',
                'status' => 0,
            ],
        ];

        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
