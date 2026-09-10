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
                'id' => 1,
                'name' => 'Jannat Alam Sneha',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801349656021',
                'designation' => 'Manager',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '8 years',
                'biography' => '<p>Jannat Alam Sneha serves as the Manager at AL FAHIM INTERNATIONAL. With over 8 years of proven leadership in foreign manpower recruitment and operational management, she supervises daily agency workflows, recruitment teams, and candidate placement procedures.</p><p>She is committed to maintaining strict compliance with government regulatory bodies, BMET protocols, and foreign employer standards, ensuring transparent, ethical, and hassle-free overseas employment for thousands of candidates.</p>',
                'image' => 'upload/our_team/jannat_alam_sneha.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 2,
                'name' => 'Sohani',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801349656026',
                'designation' => 'Ass. Marketing Manager',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '6 years',
                'biography' => '<p>Sohani is the Assistant Marketing Manager at AL FAHIM INTERNATIONAL. She plays a pivotal role in formulating and executing strategic marketing campaigns across digital and regional platforms to connect skilled job seekers with premium foreign employers.</p><p>Her expertise spans brand development, campaign analytics, employer outreach, and organizing large-scale overseas recruitment drives across Bangladesh.</p>',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 3,
                'name' => 'Rafsan Jani',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801349656028',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '4 years',
                'biography' => '<p>Rafsan Jani works as a dedicated Marketing Officer at AL FAHIM INTERNATIONAL. He specializes in candidate engagement, technical trade test coordination, and professional skill assessment for international recruitment.</p><p>He works closely with job seekers targeting construction, heavy industry, and hospitality vacancies in Saudi Arabia, the UAE, and Europe, guiding them through every step from registration to departure.</p>',
                'image' => 'upload/our_team/rafsan_jani.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 4,
                'name' => 'Nadim',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801349656022',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Nadim is a proactive Marketing Officer known for his comprehensive candidate counseling and client relationship management at AL FAHIM INTERNATIONAL.</p><p>He assists applicants with job selection, contract term clarification, salary transparency, and document preparation, ensuring candidates are fully informed and well-prepared for their overseas careers.</p>',
                'image' => 'upload/our_team/nadim.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 5,
                'name' => 'Mizanur Rahman',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801326748243',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '5 years',
                'biography' => '<p>Mizanur Rahman brings over 5 years of rich experience as a Marketing Officer at AL FAHIM INTERNATIONAL. His primary focus is on regional talent sourcing, employer circular dissemination, and field outreach programs.</p><p>He has successfully guided hundreds of candidates into overseas placements in Malaysia, the Middle East, and Eastern European countries through ethical recruitment practices.</p>',
                'image' => 'upload/our_team/mizanur_rahman.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 6,
                'name' => 'Suchona',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801349656031',
                'designation' => 'Receptionist',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Suchona is the welcoming front-desk Receptionist at AL FAHIM INTERNATIONAL. As the first point of contact for visitors and prospective candidates, she ensures warm hospitality, manages appointment schedules, and answers general queries.</p><p>She also handles incoming phone communications, directs candidates to the appropriate counseling desks, and maintains the front-office guest log with utmost professionalism.</p>',
                'image' => 'upload/our_team/suchona.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 7,
                'name' => 'Suyab Khan',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801349656020',
                'designation' => 'IT Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '4 years',
                'biography' => '<p>Suyab Khan is an IT Officer at AL FAHIM INTERNATIONAL, responsible for maintaining office technology infrastructure, candidate database management, and network security.</p><p>He oversees automated application tracking systems, digital biometric archiving, and system reliability to support uninterrupted agency operations and fast-track digital processing.</p>',
                'image' => 'upload/our_team/suyab_khan.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 8,
                'name' => 'Ornob Ahmed',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801340395635',
                'designation' => 'IT Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '4 years',
                'biography' => '<p>Ornob Ahmed serves as an IT Officer at AL FAHIM INTERNATIONAL, handling website updates, digital portals, hardware maintenance, and data backup solutions.</p><p>He ensures that online candidate registrations, visa status tracking tools, and client communications run smoothly and securely around the clock.</p>',
                'image' => 'upload/our_team/ornob_ahmed.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 9,
                'name' => 'Hasnain Ahmed',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801354935708',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Hasnain Ahmed is an energetic Marketing Officer at AL FAHIM INTERNATIONAL, specializing in public relations, field outreach, and overseas job promotion.</p><p>He actively assists job seekers in understanding medical clearance procedures, embassy documentation, and visa verification stages, providing trustworthy support at every phase.</p>',
                'image' => 'upload/our_team/hasnain_ahmed.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 10,
                'name' => 'Nayon Tara',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801353892206',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Nayon Tara is a Marketing Officer at AL FAHIM INTERNATIONAL focused on candidate guidance, hospitality sector recruitment, and customer service.</p><p>She provides personalized counseling to prospective candidates, clarifying job responsibilities, accommodation details, and workplace benefits for foreign placements.</p>',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 11,
                'name' => 'Shihab',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801882699747',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Shihab serves as a Marketing Officer at AL FAHIM INTERNATIONAL, specializing in candidate recruitment for technical trades, driving, logistics, and industrial sectors.</p><p>He works diligently to match candidate credentials with verified foreign demand orders, ensuring high selection rates during employer interviews.</p>',
                'image' => 'upload/our_team/shihab.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 12,
                'name' => 'Sajib',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801351340814',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Sajib is a Marketing Officer at AL FAHIM INTERNATIONAL, managing direct applicant inquiries, hotline support, and candidate onboarding.</p><p>His prompt communication and clear explanations help candidates navigate passport submissions, GAMCA medical tests, and pre-departure briefings with confidence.</p>',
                'image' => 'upload/our_team/sajib.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 13,
                'name' => 'Ashik',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801349656027',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Ashik serves as a Marketing Officer at AL FAHIM INTERNATIONAL, actively engaging with prospective workers and youth seeking overseas employment opportunities.</p><p>He provides detailed insights regarding visa processing timelines, documentation requirements, and embassy verification procedures to ensure seamless candidate transitions.</p>',
                'image' => 'upload/our_team/ashik.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 14,
                'name' => 'Muntaha',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801353786478',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Muntaha is a dedicated Marketing Officer at AL FAHIM INTERNATIONAL, responsible for applicant consultations, profile assessments, and customer engagement.</p><p>She is committed to transparent communication, helping job seekers identify the best foreign career opportunities suited to their qualifications and career aspirations.</p>',
                'image' => 'upload/our_team/muntaha.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 15,
                'name' => 'Lima Sultana',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+8801739930072',
                'designation' => 'Marketing Officer',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '4 years',
                'biography' => '<p>Lima Sultana is an experienced Marketing Officer at AL FAHIM INTERNATIONAL with expertise in candidate counseling, foreign visa processing pathways, and career guidance.</p><p>She assists candidates across various sectors with document verification, interview preparation, and pre-departure readiness, delivering trusted and personalized support.</p>',
                'image' => 'upload/our_team/lima_sultana.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => 16,
                'name' => 'Sohag',
                'email' => 'alfahiminternational944@gmail.com',
                'phone' => '+880 1799-069052',
                'designation' => 'Office Assistant',
                'facebook' => 'https://www.facebook.com/share/196jqwbpyM/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '3 years',
                'biography' => '<p>Sohag is an attentive Office Assistant at AL FAHIM INTERNATIONAL. He manages daily administrative operations, document dispatch, office logistics, and candidate assistance to maintain an orderly and efficient workplace environment.</p>',
                'image' => 'upload/our_team/sohag.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        // Clear existing records and reseed
        OurTeam::query()->delete();

        foreach ($ourTeams as $ourTeam) {
            OurTeam::create($ourTeam);
        }
    }
}
