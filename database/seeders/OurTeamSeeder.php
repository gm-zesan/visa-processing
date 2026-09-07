<?php

namespace Database\Seeders;

use App\Models\OurTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ourTeams = array(
            array(
                'id' => '1',
                'name' => 'Hasibur Rahman Fahim',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801624238179',
                'designation' => 'Chief Executive Officer (CEO)',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '12 years',
                'biography' => '<p>Hasibur Rahman Fahim is the founder and Chief Executive Officer (CEO) of AL FAHIM INTERNATIONAL. With over 12 years of experience in international manpower recruitment and foreign employment solutions, he has established strong partnerships with leading employers across the Gulf, Southeast Asia, and Europe.</p>',
                'image' => 'upload/our_team/20240319041954.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'name' => 'Mahmudul Hasan',
                'email' => 'mahmud@alfahiminternational.com',
                'phone' => '+880 1700 000 002',
                'designation' => 'Director - Overseas Recruitment',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '10 years',
                'biography' => '<p>Mahmudul Hasan oversees client relationships and foreign employer quota approvals for Saudi Arabia, Dubai (UAE), and European operations. He ensures seamless compliance with bilateral labor agreements.</p>',
                'image' => 'upload/our_team/20240319041828.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'name' => 'Nusrat Jahan',
                'email' => 'nusrat@alfahiminternational.com',
                'phone' => '+880 1700 000 003',
                'designation' => 'Senior Work Permit Specialist',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '7 years',
                'biography' => '<p>Nusrat Jahan manages work permit authorizations, medical fitness verification, and document attestation for Maldives, Malaysia, and Romania candidates.</p>',
                'image' => 'upload/our_team/20240319041840.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'name' => 'Kamrul Islam',
                'email' => 'kamrul@alfahiminternational.com',
                'phone' => '+880 1700 000 004',
                'designation' => 'Embassy Visa Processing Officer',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '6 years',
                'biography' => '<p>Kamrul Islam coordinates visa stamping procedures with foreign embassies, GAMCA medical center liaisons, and biometric submissions.</p>',
                'image' => 'upload/our_team/20240319042051.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'name' => 'Shahidul Alam',
                'email' => 'shahid@alfahiminternational.com',
                'phone' => '+880 1700 000 005',
                'designation' => 'BMET & Deployment Manager',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '9 years',
                'biography' => '<p>Shahidul Alam leads government immigration clearances, BMET smart card processing, pre-departure training, and air ticketing operations.</p>',
                'image' => 'upload/our_team/20240319041942.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '6',
                'name' => 'Sumaiya Akter',
                'email' => 'sumaiya@alfahiminternational.com',
                'phone' => '+880 1700 000 006',
                'designation' => 'Candidate Relations Coordinator',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '4 years',
                'biography' => '<p>Sumaiya Akter provides dedicated support for applicant inquiries, interview scheduling, document collection, and status updates.</p>',
                'image' => 'upload/our_team/20240319041912.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        foreach ($ourTeams as $ourTeam) {
            OurTeam::updateOrCreate(['id' => $ourTeam['id']], $ourTeam);
        }
    }
}
