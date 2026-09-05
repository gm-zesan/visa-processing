<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = array(
            array(
                'id' => '1',
                'category_id' => '1',
                'title' => 'Complete Guide to Securing a Romania Work Permit in 2024',
                'slug' => 'guide-to-romania-work-permit-2024',
                'description' => '<p>Romania has become one of the premier European employment destinations for overseas workers. Learn about the complete process of obtaining an official Romanian Work Permit (Aviz de Munca) from the General Inspectorate for Immigration (IGI), followed by the long-stay D/AM work visa.</p><p>Key steps include document translation and apostille, police clearance verification, medical fit certificate, embassy submission, and receiving your European residence permit.</p>',
                'image' => 'upload/blog/20240316081930.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'category_id' => '1',
                'title' => 'Saudi Arabia Work Visa: GAMCA Medical & Qiwa Contract Guidelines',
                'slug' => 'saudi-arabia-work-visa-gamca-medical-qiwa-guide',
                'description' => '<p>Navigating the Saudi Arabia employment visa system is straightforward when complying with official regulations. This guide walks you through registering on the Qiwa platform, verifying your electronic employment contract, passing the GAMCA medical fitness exam, and getting your visa stamped at the Saudi Embassy.</p><p>We also outline the benefits under Saudi Labor Law including standard working hours, Iqama issuance, and end-of-service gratuity.</p>',
                'image' => 'upload/blog/20240316081942.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'category_id' => '1',
                'title' => 'Malaysia Calling Visa & Work Permit: Rules and Procedures',
                'slug' => 'malaysia-calling-visa-work-permit-procedures',
                'description' => '<p>Malaysia continues to welcome foreign workers across vital sectors under the government-approved Calling Visa (VDR) quota system. Understand how the bio-medical screening works, FOMEMA guidelines, Single Entry Visa endorsement, and BMET immigration clearance.</p><p>Discover the required documentation and essential tips for a smooth pre-departure experience.</p>',
                'image' => 'upload/blog/20240316081953.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['id' => $blog['id']], $blog);
        }
    }
}
