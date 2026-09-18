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
                'name' => 'Fahim Al Hasan',
                'name_bn' => 'ফাহিম আল হাসান',
                'email' => 'fahim@alfahiminternational.com',
                'phone' => '+880 1700 000 001',
                'designation' => 'Managing Director',
                'designation_bn' => 'ব্যবস্থাপনা পরিচালক',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '12 years',
                'biography' => '<p>Fahim Al Hasan is the founder and Managing Director of AL FAHIM INTERNATIONAL. With over 12 years of experience in international manpower recruitment and foreign employment solutions, he has established strong partnerships with leading employers across the Gulf, Southeast Asia, and Europe.</p>',
                'biography_bn' => '<p>ফাহিম আল হাসান আল ফাহিম ইন্টারন্যাশনাল-এর প্রতিষ্ঠাতা এবং ব্যবস্থাপনা পরিচালক। আন্তর্জাতিক জনশক্তি নিয়োগ এবং বিদেশী কর্মসংস্থান সমাধানে ১২ বছরেরও বেশি অভিজ্ঞতার সাথে, তিনি উপসাগরীয় অঞ্চল, দক্ষিণ-পূর্ব এশিয়া এবং ইউরোপ জুড়ে নেতৃস্থানীয় নিয়োগকারীদের সাথে শক্তিশালী অংশীদারিত্ব স্থাপন করেছেন।</p>',
                'image' => 'upload/our_team/20240319041954.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'name' => 'Mahmudul Hasan',
                'name_bn' => 'মাহমুদুল হাসান',
                'email' => 'mahmud@alfahiminternational.com',
                'phone' => '+880 1700 000 002',
                'designation' => 'Director - Overseas Recruitment',
                'designation_bn' => 'পরিচালক - ওভারসিজ রিক্রুটমেন্ট',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '10 years',
                'biography' => '<p>Mahmudul Hasan oversees client relationships and foreign employer quota approvals for Saudi Arabia, Dubai (UAE), and European operations. He ensures seamless compliance with bilateral labor agreements.</p>',
                'biography_bn' => '<p>মাহমুদুল হাসান সৌদি আরব, দুবাই (ইউএই) এবং ইউরোপীয় কার্যক্রমের জন্য ক্লায়েন্ট সম্পর্ক এবং বিদেশী নিয়োগকর্তার কোটা অনুমোদন তদারকি করেন। তিনি দ্বিপাক্ষিক শ্রম চুক্তির সাথে নির্বিঘ্ন সম্মতি নিশ্চিত করেন।</p>',
                'image' => 'upload/our_team/20240319041828.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'name' => 'Nusrat Jahan',
                'name_bn' => 'নুসরাত জাহান',
                'email' => 'nusrat@alfahiminternational.com',
                'phone' => '+880 1700 000 003',
                'designation' => 'Senior Work Permit Specialist',
                'designation_bn' => 'সিনিয়র ওয়ার্ক পারমিট স্পেশালিস্ট',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '7 years',
                'biography' => '<p>Nusrat Jahan manages work permit authorizations, medical fitness verification, and document attestation for Maldives, Malaysia, and Romania candidates.</p>',
                'biography_bn' => '<p>নুসরাত জাহান মালদ্বীপ, মালয়েশিয়া এবং রোমানিয়ার প্রার্থীদের জন্য ওয়ার্ক পারমিট অনুমোদন, মেডিকেল ফিটনেস যাচাইকরণ এবং নথিপত্র সত্যায়নের কাজ পরিচালনা করেন।</p>',
                'image' => 'upload/our_team/20240319041840.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'name' => 'Kamrul Islam',
                'name_bn' => 'কামরুল ইসলাম',
                'email' => 'kamrul@alfahiminternational.com',
                'phone' => '+880 1700 000 004',
                'designation' => 'Embassy Visa Processing Officer',
                'designation_bn' => 'এম্বেসি ভিসা প্রসেসিং অফিসার',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '6 years',
                'biography' => '<p>Kamrul Islam coordinates visa stamping procedures with foreign embassies, GAMCA medical center liaisons, and biometric submissions.</p>',
                'biography_bn' => '<p>কামরুল ইসলাম বিদেশী দূতাবাস, গামকা মেডিকেল সেন্টার এবং বায়োমেট্রিক জমা দেওয়ার সাথে ভিসা স্ট্যাম্পিং পদ্ধতি সমন্বয় করেন।</p>',
                'image' => 'upload/our_team/20240319042051.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'name' => 'Shahidul Alam',
                'name_bn' => 'শহিদুল আলম',
                'email' => 'shahid@alfahiminternational.com',
                'phone' => '+880 1700 000 005',
                'designation' => 'BMET & Deployment Manager',
                'designation_bn' => 'বিএমইটি এবং ডিপ্লয়মেন্ট ম্যানেজার',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '9 years',
                'biography' => '<p>Shahidul Alam leads government immigration clearances, BMET smart card processing, pre-departure training, and air ticketing operations.</p>',
                'biography_bn' => '<p>শহিদুল আলম সরকারী ইমিগ্রেশন ক্লিয়ারেন্স, বিএমইটি স্মার্ট কার্ড প্রসেসিং, প্রাক-প্রস্থান প্রশিক্ষণ এবং এয়ার টিকেটিং কার্যক্রম পরিচালনা করেন।</p>',
                'image' => 'upload/our_team/20240319041942.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '6',
                'name' => 'Sumaiya Akter',
                'name_bn' => 'সুমাইয়া আক্তার',
                'email' => 'sumaiya@alfahiminternational.com',
                'phone' => '+880 1700 000 006',
                'designation' => 'Candidate Relations Coordinator',
                'designation_bn' => 'ক্যান্ডিডেট রিলেশন্স কোঅর্ডিনেটর',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'experience' => '4 years',
                'biography' => '<p>Sumaiya Akter provides dedicated support for applicant inquiries, interview scheduling, document collection, and status updates.</p>',
                'biography_bn' => '<p>সুমাইয়া আক্তার আবেদনকারীদের জিজ্ঞাসা, ইন্টারভিউ শিডিউলিং, ডকুমেন্ট সংগ্রহ এবং স্ট্যাটাস আপডেটের জন্য নিবেদিত সহায়তা প্রদান করেন।</p>',
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
