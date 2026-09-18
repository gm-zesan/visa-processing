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
        CountryDetails::whereNotIn('id', [1, 2, 3, 4, 5])->delete();

        $country_details = array(
            array(
                'id' => '1',
                'country_id' => '462', // Maldives
                'image' => 'upload/country/country_1_maldives.jpg',
                'subtitle' => 'Official Maldives Overseas Employment & Hospitality Guide',
                'subtitle_bn' => 'মালদ্বীপ ওভারসিজ এমপ্লয়মেন্ট ও হসপিটালিটি গাইড',
                'language' => 'Dhivehi & English',
                'language_bn' => 'দিভেহি এবং ইংরেজি',
                'processing_time' => '30 - 45 Working Days',
                'processing_time_bn' => '৩০ - ৪৫ কর্মদিবস',
                'description' => '<p>The Maldives offers exceptional overseas employment opportunities with comprehensive work permit and legal employment authorization. We provide end-to-end recruitment assistance, verified employment contracts, work permit processing, and legal deployment for candidates seeking careers in the Maldives.</p><p>All candidates receive complete assistance with Ministry of Economic Development work permit approval, medical clearances, visa stamping, and pre-departure briefings.</p>',
                'description_bn' => '<p>মালদ্বীপ ব্যাপক ওয়ার্ক পারমিট এবং আইনি কর্মসংস্থান অনুমোদনের সাথে চমৎকার বিদেশী কর্মসংস্থানের সুযোগ প্রদান করে। আমরা মালদ্বীপে ক্যারিয়ার গড়তে ইচ্ছুক প্রার্থীদের জন্য এন্ড-টু-এন্ড রিক্রুটমেন্ট সহায়তা, যাচাইকৃত কর্মসংস্থান চুক্তি, ওয়ার্ক পারমিট প্রসেসিং এবং আইনি ডিপ্লয়মেন্ট প্রদান করি।</p><p>সকল প্রার্থী মিনিস্ট্রি অফ ইকোনমিক ডেভেলপমেন্ট ওয়ার্ক পারমিট অনুমোদন, মেডিকেল ক্লিয়ারেন্স, ভিসা স্ট্যাম্পিং এবং প্রি-ডিপার্চার ব্রিফিং-এর ক্ষেত্রে সম্পূর্ণ সহায়তা পান।</p>',
                'sectors' => [
                    [
                        'title' => 'Resort & Luxury Hospitality',
                        'description' => 'Island resort operations, guest services, culinary & kitchen staff, housekeeping, and front office management.',
                        'icon' => 'fa-hotel'
                    ],
                    [
                        'title' => 'Construction & Island Engineering',
                        'description' => 'Reclamation engineering, coastal civil construction, resort architecture, masonry, and steel fabrication.',
                        'icon' => 'fa-trowel-bricks'
                    ],
                    [
                        'title' => 'Facilities & Marine Maintenance',
                        'description' => 'Desalination plant technicians, generators, commercial refrigeration, HVAC, and boat mechanics.',
                        'icon' => 'fa-screwdriver-wrench'
                    ],
                    [
                        'title' => 'Marine Logistics & Airport Services',
                        'description' => 'Speedboat crew, cargo stevedoring, island logistics, warehouse distribution, and ground airport handling.',
                        'icon' => 'fa-ship'
                    ]
                ],
                'sectors_bn' => [
                    [
                        'title' => 'রিসোর্ট ও লাক্সারি হসপিটালিটি',
                        'description' => 'আইল্যান্ড রিসোর্ট অপারেশন, গেস্ট সার্ভিস, রন্ধনসম্পর্কীয় ও রান্নাঘর কর্মী, হাউসকিপিং এবং ফ্রন্ট অফিস ম্যানেজমেন্ট।',
                        'icon' => 'fa-hotel'
                    ],
                    [
                        'title' => 'কনস্ট্রাকশন ও আইল্যান্ড ইঞ্জিনিয়ারিং',
                        'description' => 'রিক্লেমেশন ইঞ্জিনিয়ারিং, কোস্টাল সিভিল কনস্ট্রাকশন, রিসোর্ট আর্কিটেকচার, মেসনারি এবং স্টিল ফেব্রিকেশন।',
                        'icon' => 'fa-trowel-bricks'
                    ],
                    [
                        'title' => 'ফ্যাসিলিটিজ ও মেরিন মেইনটেন্যান্স',
                        'description' => 'ডেস্যালিনেশন প্ল্যান্ট টেকনিশিয়ান, জেনারেটর, কমার্শিয়াল রেফ্রিজারেশন, এইচভিএসি এবং বোট মেকানিক।',
                        'icon' => 'fa-screwdriver-wrench'
                    ],
                    [
                        'title' => 'মেরিন লজিস্টিকস ও এয়ারপোর্ট সার্ভিসেস',
                        'description' => 'স্পিডবোট ক্রু, কার্গো স্টিভেডোরিং, আইল্যান্ড লজিস্টিকস, ওয়্যারহাউস ডিস্ট্রিবিউশন এবং গ্রাউন্ড এয়ারপোর্ট হ্যান্ডলিং।',
                        'icon' => 'fa-ship'
                    ]
                ],
                'worker_protections' => [
                    [
                        'title' => 'Ministry-Attested Employment Contract',
                        'description' => 'Contracts are verified by the Ministry of Economic Development, specifying exact salary, duty hours, food, and annual ticket.',
                        'icon' => 'fa-scale-balanced'
                    ],
                    [
                        'title' => 'Employer-Provided Housing & Healthcare',
                        'description' => 'Employers must provide approved island accommodation, nutritious meals, and comprehensive expat health insurance.',
                        'icon' => 'fa-shield-heart'
                    ],
                    [
                        'title' => 'Mandatory BMET Emigration Clearance',
                        'description' => 'Full legal registration with the Bureau of Manpower, Employment and Training (BMET) with smart card protection.',
                        'icon' => 'fa-building-columns'
                    ]
                ],
                'worker_protections_bn' => [
                    [
                        'title' => 'মন্ত্রণালয়-সত্যায়িত কর্মসংস্থান চুক্তি',
                        'description' => 'মিনিস্ট্রি অফ ইকোনমিক ডেভেলপমেন্ট দ্বারা চুক্তি যাচাই করা হয়, যেখানে সঠিক বেতন, ডিউটির সময়, খাবার এবং বার্ষিক টিকিট উল্লেখ থাকে।',
                        'icon' => 'fa-scale-balanced'
                    ],
                    [
                        'title' => 'নিয়োগকর্তা-প্রদত্ত আবাসন ও স্বাস্থ্যসেবা',
                        'description' => 'নিয়োগকর্তাদের অবশ্যই অনুমোদিত দ্বীপ আবাসন, পুষ্টিকর খাবার এবং ব্যাপক প্রবাসী স্বাস্থ্য বীমা প্রদান করতে হবে।',
                        'icon' => 'fa-shield-heart'
                    ],
                    [
                        'title' => 'বাধ্যতামূলক বিএমইটি (BMET) ইমিগ্রেশন ক্লিয়ারেন্স',
                        'description' => 'স্মার্ট কার্ড সুরক্ষা সহ জনশক্তি, কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো (বিএমইটি) এর সাথে সম্পূর্ণ আইনি নিবন্ধন।',
                        'icon' => 'fa-building-columns'
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'country_id' => '682', // Saudi Arabia
                'image' => 'upload/country/country_2_saudi.jpg',
                'subtitle' => 'Kingdom of Saudi Arabia Vision 2030 Employment Guide',
                'subtitle_bn' => 'কিংডম অফ সৌদি আরব ভিশন ২০৩০ কর্মসংস্থান গাইড',
                'language' => 'Arabic & English',
                'language_bn' => 'আরবি এবং ইংরেজি',
                'processing_time' => '30 - 40 Working Days',
                'processing_time_bn' => '৩০ - ৪০ কর্মদিবস',
                'description' => '<p>The Kingdom of Saudi Arabia remains one of the largest global employment hubs with massive infrastructure and economic expansion under Vision 2030. We facilitate authentic work permit visas under the Qiwa and Musaned government platforms, ensuring full legal protection, transparent employment contracts, and prompt processing.</p><p>We guide applicants through GAMCA medical fitness tests, Saudi embassy visa stamping, BMET smart card clearance, and flight deployment.</p>',
                'description_bn' => '<p>কিংডম অফ সৌদি আরব ভিশন ২০৩০-এর অধীনে ব্যাপক অবকাঠামো এবং অর্থনৈতিক সম্প্রসারণ সহ বিশ্বের বৃহত্তম বৈশ্বিক কর্মসংস্থান কেন্দ্রগুলির মধ্যে একটি। আমরা সম্পূর্ণ আইনি সুরক্ষা, স্বচ্ছ কর্মসংস্থান চুক্তি এবং দ্রুত প্রক্রিয়াকরণ নিশ্চিত করে কিওয়া (Qiwa) এবং মুসানেদ (Musaned) সরকারী প্ল্যাটফর্মের অধীনে প্রকৃত ওয়ার্ক পারমিট ভিসার সুবিধা দিই।</p><p>আমরা গামকা (GAMCA) মেডিকেল ফিটনেস টেস্ট, সৌদি দূতাবাস ভিসা স্ট্যাম্পিং, বিএমইটি স্মার্ট কার্ড ক্লিয়ারেন্স এবং ফ্লাইট ডিপ্লয়মেন্টের মাধ্যমে আবেদনকারীদের গাইড করি।</p>',
                'sectors' => [
                    [
                        'title' => 'Giga-Projects & Mega Construction',
                        'description' => 'Civil infrastructure across NEOM, Red Sea, Riyadh Metro, structural engineering, welding, and equipment operation.',
                        'icon' => 'fa-city'
                    ],
                    [
                        'title' => 'Oil, Gas & Petrochemical Services',
                        'description' => 'Refinery maintenance, industrial piping, instrumentation technicians, and occupational health & safety.',
                        'icon' => 'fa-oil-well'
                    ],
                    [
                        'title' => 'Electromechanical & MEP Facilities',
                        'description' => 'High-voltage electrical networks, commercial HVAC cooling, plumbing networks, and facility operations.',
                        'icon' => 'fa-bolt'
                    ],
                    [
                        'title' => 'Logistics, Transport & Supply Chain',
                        'description' => 'Heavy trailer driving, automated warehousing, cargo distribution centers, and fleet maintenance.',
                        'icon' => 'fa-truck-moving'
                    ]
                ],
                'sectors_bn' => [
                    [
                        'title' => 'গিগা-প্রজেক্ট ও মেগা কনস্ট্রাকশন',
                        'description' => 'নিয়োম (NEOM), লোহিত সাগর, রিয়াদ মেট্রো, স্ট্রাকচারাল ইঞ্জিনিয়ারিং, ওয়েল্ডিং এবং সরঞ্জাম পরিচালনা জুড়ে সিভিল অবকাঠামো।',
                        'icon' => 'fa-city'
                    ],
                    [
                        'title' => 'তেল, গ্যাস ও পেট্রোকেমিক্যাল সার্ভিসেস',
                        'description' => 'রিফাইনারি রক্ষণাবেক্ষণ, ইন্ডাস্ট্রিয়াল পাইপিং, ইনস্ট্রুমেন্টেশন টেকনিশিয়ান এবং পেশাগত স্বাস্থ্য ও নিরাপত্তা।',
                        'icon' => 'fa-oil-well'
                    ],
                    [
                        'title' => 'ইলেক্ট্রোমেকানিক্যাল ও এমইপি (MEP) ফ্যাসিলিটিজ',
                        'description' => 'হাই-ভোল্টেজ ইলেকট্রিক্যাল নেটওয়ার্ক, কমার্শিয়াল এইচভিএসি (HVAC) কুলিং, প্লাম্বিং নেটওয়ার্ক এবং ফ্যাসিলিটি অপারেশন।',
                        'icon' => 'fa-bolt'
                    ],
                    [
                        'title' => 'লজিস্টিকস, ট্রান্সপোর্ট ও সাপ্লাই চেইন',
                        'description' => 'ভারী ট্রেইলার ড্রাইভিং, স্বয়ংক্রিয় ওয়্যারহাউসিং, কার্গো ডিস্ট্রিবিউশন সেন্টার এবং ফ্লিট মেইনটেন্যান্স।',
                        'icon' => 'fa-truck-moving'
                    ]
                ],
                'worker_protections' => [
                    [
                        'title' => 'Qiwa Electronic Labor Contract',
                        'description' => 'Electronic contracts registered on Qiwa platform ensure salary protection via official bank transfer and wage guarantees.',
                        'icon' => 'fa-file-signature'
                    ],
                    [
                        'title' => 'Mandatory Health Insurance (CCHI)',
                        'description' => 'Employers provide Council of Health Insurance accredited medical cards covering hospital treatments and emergencies.',
                        'icon' => 'fa-heart-pulse'
                    ],
                    [
                        'title' => 'BMET Smart Card Immigration Security',
                        'description' => 'Government emigration verification, insurance coverage, and official overseas worker welfare fund inclusion.',
                        'icon' => 'fa-id-card'
                    ]
                ],
                'worker_protections_bn' => [
                    [
                        'title' => 'কিওয়া (Qiwa) ইলেকট্রনিক লেবার কন্ট্রাক্ট',
                        'description' => 'কিওয়া প্ল্যাটফর্মে নিবন্ধিত ইলেকট্রনিক চুক্তিগুলি অফিসিয়াল ব্যাঙ্ক ট্রান্সফার এবং মজুরি গ্যারান্টির মাধ্যমে বেতন সুরক্ষা নিশ্চিত করে।',
                        'icon' => 'fa-file-signature'
                    ],
                    [
                        'title' => 'বাধ্যতামূলক স্বাস্থ্য বীমা (CCHI)',
                        'description' => 'নিয়োগকর্তারা হাসপাতাল চিকিত্সা এবং জরুরী অবস্থা কভার করে কাউন্সিল অফ হেলথ ইন্স্যুরেন্স স্বীকৃত মেডিকেল কার্ড প্রদান করে।',
                        'icon' => 'fa-heart-pulse'
                    ],
                    [
                        'title' => 'বিএমইটি স্মার্ট কার্ড ইমিগ্রেশন সিকিউরিটি',
                        'description' => 'সরকারী ইমিগ্রেশন যাচাইকরণ, বীমা কভারেজ এবং অফিসিয়াল বিদেশী কর্মী কল্যাণ তহবিল অন্তর্ভুক্তি।',
                        'icon' => 'fa-id-card'
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'country_id' => '784', // United Arab Emirates (Dubai)
                'image' => 'upload/country/country_3_uae.jpg',
                'subtitle' => 'Dubai & United Arab Emirates Career & Living Guide',
                'subtitle_bn' => 'দুবাই এবং সংযুক্ত আরব আমিরাত ক্যারিয়ার এবং লিভিং গাইড',
                'language' => 'Arabic & English',
                'language_bn' => 'আরবি এবং ইংরেজি',
                'processing_time' => '25 - 35 Working Days',
                'processing_time_bn' => '২৫ - ৩৫ কর্মদিবস',
                'description' => '<p>Dubai and the United Arab Emirates provide vibrant overseas job opportunities with competitive tax-free earnings and world-class living standards. Our agency connects prospective workers with government-registered UAE employers offering official MOHRE employment entry permits and residence work visas.</p><p>We handle the complete cycle including entry permit issuance, medical screening, Emirates ID processing, BMET clearance, and overseas deployment.</p>',
                'description_bn' => '<p>দুবাই এবং সংযুক্ত আরব আমিরাত প্রতিযোগিতামূলক করমুক্ত উপার্জন এবং বিশ্বমানের জীবনযাত্রার মানের সাথে প্রাণবন্ত বিদেশী চাকরির সুযোগ প্রদান করে। আমাদের সংস্থা সম্ভাব্য কর্মীদের সরকার-নিবন্ধিত সংযুক্ত আরব আমিরাতের নিয়োগকর্তাদের সাথে সংযুক্ত করে যারা অফিসিয়াল মোহরে (MOHRE) কর্মসংস্থান এন্ট্রি পারমিট এবং রেসিডেন্স ওয়ার্ক ভিসা প্রদান করে।</p><p>আমরা এন্ট্রি পারমিট ইস্যু করা, মেডিকেল স্ক্রীনিং, এমিরেটস আইডি প্রক্রিয়াকরণ, বিএমইটি ক্লিয়ারেন্স এবং বিদেশী ডিপ্লয়মেন্ট সহ সম্পূর্ণ চক্রটি পরিচালনা করি।</p>',
                'sectors' => [
                    [
                        'title' => 'Commercial Construction & Architecture',
                        'description' => 'High-rise towers, civil concrete work, facade finishing, aluminum fabrication, and project safety.',
                        'icon' => 'fa-trowel-bricks'
                    ],
                    [
                        'title' => 'Luxury Hospitality & Commercial Retail',
                        'description' => 'Five-star hotel chains, restaurant culinary teams, luxury retail customer service, and event operations.',
                        'icon' => 'fa-utensils'
                    ],
                    [
                        'title' => 'Facilities Management & MEP Services',
                        'description' => 'Smart building maintenance, central chiller plants, electrical switchgear, and fire safety systems.',
                        'icon' => 'fa-building-shield'
                    ],
                    [
                        'title' => 'Aviation, Ports & Cargo Logistics',
                        'description' => 'Airport ground handling, seaport container logistics, courier distribution, and heavy forklift operation.',
                        'icon' => 'fa-plane-departure'
                    ]
                ],
                'sectors_bn' => [
                    [
                        'title' => 'কমার্শিয়াল কনস্ট্রাকশন ও আর্কিটেকচার',
                        'description' => 'উঁচু টাওয়ার, সিভিল কংক্রিট কাজ, ফ্যাসাড ফিনিশিং, অ্যালুমিনিয়াম ফেব্রিকেশন এবং প্রজেক্ট সেফটি।',
                        'icon' => 'fa-trowel-bricks'
                    ],
                    [
                        'title' => 'লাক্সারি হসপিটালিটি ও কমার্শিয়াল রিটেইল',
                        'description' => 'ফাইভ-স্টার হোটেল চেইন, রেস্তোরাঁর রন্ধনসম্পর্কীয় দল, লাক্সারি রিটেইল কাস্টমার সার্ভিস এবং ইভেন্ট অপারেশন।',
                        'icon' => 'fa-utensils'
                    ],
                    [
                        'title' => 'ফ্যাসিলিটিজ ম্যানেজমেন্ট ও এমইপি সার্ভিসেস',
                        'description' => 'স্মার্ট বিল্ডিং মেইনটেন্যান্স, সেন্ট্রাল চিলার প্ল্যান্ট, ইলেকট্রিক্যাল সুইচগিয়ার এবং ফায়ার সেফটি সিস্টেম।',
                        'icon' => 'fa-building-shield'
                    ],
                    [
                        'title' => 'এভিয়েশন, পোর্টস ও কার্গো লজিস্টিকস',
                        'description' => 'এয়ারপোর্ট গ্রাউন্ড হ্যান্ডলিং, সিপোর্ট কন্টেইনার লজিস্টিকস, কুরিয়ার ডিস্ট্রিবিউশন এবং হেভি ফর্কলিফ্ট অপারেশন।',
                        'icon' => 'fa-plane-departure'
                    ]
                ],
                'worker_protections' => [
                    [
                        'title' => 'MOHRE Wages Protection System (WPS)',
                        'description' => 'All salaries are legally monitored and transferred through the UAE Central Bank WPS system without deduction.',
                        'icon' => 'fa-shield-halved'
                    ],
                    [
                        'title' => 'Comprehensive UAE Health Insurance',
                        'description' => 'Employers must provide health insurance cards and approved worker accommodations adhering to Dubai municipality standards.',
                        'icon' => 'fa-notes-medical'
                    ],
                    [
                        'title' => 'Official BMET Emigration Clearances',
                        'description' => 'Pre-departure smart card verification ensuring statutory immigration exit approval and worker welfare fund rights.',
                        'icon' => 'fa-passport'
                    ]
                ],
                'worker_protections_bn' => [
                    [
                        'title' => 'মোহরে (MOHRE) ওয়েজেস প্রোটেকশন সিস্টেম (WPS)',
                        'description' => 'সমস্ত বেতন আইনত পর্যবেক্ষণ করা হয় এবং কোনো কর্তন ছাড়াই সংযুক্ত আরব আমিরাতের সেন্ট্রাল ব্যাঙ্ক WPS সিস্টেমের মাধ্যমে স্থানান্তর করা হয়।',
                        'icon' => 'fa-shield-halved'
                    ],
                    [
                        'title' => 'কম্প্রিহেন্সিভ ইউএই হেলথ ইন্স্যুরেন্স',
                        'description' => 'নিয়োগকর্তাদের অবশ্যই দুবাই পৌরসভার মানদণ্ড মেনে স্বাস্থ্য বীমা কার্ড এবং অনুমোদিত কর্মী আবাসন প্রদান করতে হবে।',
                        'icon' => 'fa-notes-medical'
                    ],
                    [
                        'title' => 'অফিসিয়াল বিএমইটি ইমিগ্রেশন ক্লিয়ারেন্স',
                        'description' => 'প্রস্থান-পূর্ব স্মার্ট কার্ড যাচাইকরণ যা সংবিধিবদ্ধ ইমিগ্রেশন প্রস্থান অনুমোদন এবং কর্মী কল্যাণ তহবিলের অধিকার নিশ্চিত করে।',
                        'icon' => 'fa-passport'
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'country_id' => '458', // Malaysia
                'image' => 'upload/country/country_4_malaysia.jpg',
                'subtitle' => 'Official Malaysia Calling Visa & Industrial Recruitment Guide',
                'subtitle_bn' => 'অফিসিয়াল মালয়েশিয়া কলিং ভিসা ও ইন্ডাস্ট্রিয়াল রিক্রুটমেন্ট গাইড',
                'language' => 'Malay & English',
                'language_bn' => 'মালয় এবং ইংরেজি',
                'processing_time' => '45 - 60 Working Days',
                'processing_time_bn' => '৪৫ - ৬০ কর্মদিবস',
                'description' => '<p>Malaysia is a premier destination for overseas employment across key industrial and service sectors. We process genuine Malaysian Calling Visas (Visa with Reference - VDR) in strict compliance with the Malaysian Ministry of Human Resources and Immigration Department regulations.</p><p>Our services include verified quota allocations, FOMEMA medical coordination, Malaysian High Commission visa endorsement, and government flight clearance.</p>',
                'description_bn' => '<p>মালয়েশিয়া প্রধান শিল্প এবং পরিষেবা খাত জুড়ে বিদেশী কর্মসংস্থানের জন্য একটি প্রধান গন্তব্য। আমরা মালয়েশিয়ার মানবসম্পদ মন্ত্রণালয় এবং ইমিগ্রেশন বিভাগের প্রবিধানগুলি কঠোরভাবে মেনে প্রকৃত মালয়েশিয়ান কলিং ভিসা (ভিসা উইথ রেফারেন্স - VDR) প্রক্রিয়া করি।</p><p>আমাদের পরিষেবাগুলির মধ্যে যাচাইকৃত কোটা বরাদ্দ, ফোমেমা (FOMEMA) মেডিকেল সমন্বয়, মালয়েশিয়ান হাইকমিশনের ভিসা এনডোর্সমেন্ট এবং সরকারী ফ্লাইট ক্লিয়ারেন্স অন্তর্ভুক্ত।</p>',
                'sectors' => [
                    [
                        'title' => 'Electronics & Industrial Manufacturing',
                        'description' => 'Semiconductor manufacturing, precision assembly, plastic molding, quality inspection, and packaging.',
                        'icon' => 'fa-microchip'
                    ],
                    [
                        'title' => 'Construction & Urban Infrastructure',
                        'description' => 'Mass transit projects, highway construction, scaffolding, steel bending, and civil structural works.',
                        'icon' => 'fa-hard-hat'
                    ],
                    [
                        'title' => 'Plantation & Agro-Processing',
                        'description' => 'Palm oil plantation harvesting, agricultural mill operations, greenhouse farming, and raw material processing.',
                        'icon' => 'fa-seedling'
                    ],
                    [
                        'title' => 'Food Processing & Central Warehousing',
                        'description' => 'Food processing factories, cold storage distribution, warehouse inventory, and packaging lines.',
                        'icon' => 'fa-boxes-stacked'
                    ]
                ],
                'sectors_bn' => [
                    [
                        'title' => 'ইলেকট্রনিক্স ও ইন্ডাস্ট্রিয়াল ম্যানুফ্যাকচারিং',
                        'description' => 'সেমিকন্ডাক্টর ম্যানুফ্যাকচারিং, প্রিসিশন অ্যাসেম্বলি, প্লাস্টিক মোল্ডিং, কোয়ালিটি ইন্সপেকশন এবং প্যাকেজিং।',
                        'icon' => 'fa-microchip'
                    ],
                    [
                        'title' => 'কনস্ট্রাকশন ও আরবান ইনফ্রাস্ট্রাকচার',
                        'description' => 'ম্যাস ট্রানজিট প্রজেক্ট, হাইওয়ে কনস্ট্রাকশন, স্ক্যাফোল্ডিং, স্টিল বেন্ডিং এবং সিভিল স্ট্রাকচারাল কাজ।',
                        'icon' => 'fa-hard-hat'
                    ],
                    [
                        'title' => 'প্লান্টেশন ও অ্যাগ্রো-প্রসেসিং',
                        'description' => 'পাম অয়েল প্ল্যান্টেশন হার্ভেস্টিং, এগ্রিকালচারাল মিল অপারেশন, গ্রীনহাউস ফার্মিং এবং র মেটেরিয়াল প্রসেসিং।',
                        'icon' => 'fa-seedling'
                    ],
                    [
                        'title' => 'ফুড প্রসেসিং ও সেন্ট্রাল ওয়্যারহাউসিং',
                        'description' => 'ফুড প্রসেসিং ফ্যাক্টরি, কোল্ড স্টোরেজ ডিস্ট্রিবিউশন, ওয়্যারহাউস ইনভেন্টরি এবং প্যাকেজিং লাইন।',
                        'icon' => 'fa-boxes-stacked'
                    ]
                ],
                'worker_protections' => [
                    [
                        'title' => 'Immigration Department VDR Approval',
                        'description' => 'Every Calling Visa is backed by the Malaysian Immigration Department approval with verified biometric quotas.',
                        'icon' => 'fa-stamp'
                    ],
                    [
                        'title' => 'SOCSO & Foreign Worker Insurance (FWCS)',
                        'description' => 'Mandatory enrollment under Social Security Organization (SOCSO) ensuring injury, medical, and disability coverage.',
                        'icon' => 'fa-user-shield'
                    ],
                    [
                        'title' => 'BMET Smart Card Government Clearance',
                        'description' => 'Clearance by Bangladesh Ministry of Expatriates\' Welfare, government brief, and digitized flight authorization.',
                        'icon' => 'fa-id-card-clip'
                    ]
                ],
                'worker_protections_bn' => [
                    [
                        'title' => 'ইমিগ্রেশন ডিপার্টমেন্ট VDR অ্যাপ্রুভাল',
                        'description' => 'প্রতিটি কলিং ভিসা যাচাইকৃত বায়োমেট্রিক কোটা সহ মালয়েশিয়ার ইমিগ্রেশন বিভাগের অনুমোদনের মাধ্যমে সমর্থিত।',
                        'icon' => 'fa-stamp'
                    ],
                    [
                        'title' => 'সোকসো (SOCSO) ও ফরেন ওয়ার্কার ইন্স্যুরেন্স (FWCS)',
                        'description' => 'সোশ্যাল সিকিউরিটি অর্গানাইজেশনের (SOCSO) অধীনে বাধ্যতামূলক তালিকাভুক্তি যা আঘাত, চিকিৎসা এবং অক্ষমতা কভারেজ নিশ্চিত করে।',
                        'icon' => 'fa-user-shield'
                    ],
                    [
                        'title' => 'বিএমইটি স্মার্ট কার্ড গভর্নমেন্ট ক্লিয়ারেন্স',
                        'description' => 'বাংলাদেশ প্রবাসী কল্যাণ মন্ত্রণালয় কর্তৃক ক্লিয়ারেন্স, সরকারী ব্রিফ এবং ডিজিটাল ফ্লাইট অনুমোদন।',
                        'icon' => 'fa-id-card-clip'
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'country_id' => '642', // Romania
                'image' => 'upload/country/country_5_romania.jpg',
                'subtitle' => 'European Union Work Permit & Living Guide (Romania)',
                'subtitle_bn' => 'ইউরোপিয়ান ইউনিয়ন ওয়ার্ক পারমিট ও লিভিং গাইড (রোমানিয়া)',
                'language' => 'Romanian & English',
                'language_bn' => 'রোমানিয়ান এবং ইংরেজি',
                'processing_time' => '60 - 90 Working Days',
                'processing_time_bn' => '৬০ - ৯০ কর্মদিবস',
                'description' => '<p>Romania is an emerging European destination offering excellent career prospects and pathways to European residency. We facilitate legal Romanian Work Permits (Aviz de Munca) issued directly by the General Inspectorate for Immigration (IGI).</p><p>We provide comprehensive support covering work permit issuance from Romania, Romanian Embassy long-stay work visa (D/AM) stamping, apostille documentation, and pre-departure arrangements.</p>',
                'description_bn' => '<p>রোমানিয়া একটি উদীয়মান ইউরোপীয় গন্তব্য যা চমৎকার ক্যারিয়ারের সম্ভাবনা এবং ইউরোপীয় রেসিডেন্সির পথ অফার করে। আমরা সরাসরি জেনারেল ইন্সপেক্টরেট ফর ইমিগ্রেশন (IGI) দ্বারা জারি করা আইনি রোমানিয়ান ওয়ার্ক পারমিট (Aviz de Munca) এর সুবিধা প্রদান করি।</p><p>আমরা রোমানিয়া থেকে ওয়ার্ক পারমিট ইস্যু করা, রোমানিয়ান দূতাবাসের দীর্ঘমেয়াদী কাজের ভিসা (D/AM) স্ট্যাম্পিং, অ্যাপোস্টিল ডকুমেন্টেশন এবং প্রস্থান-পূর্ব ব্যবস্থা কভার করে ব্যাপক সহায়তা প্রদান করি।</p>',
                'sectors' => [
                    [
                        'title' => 'European Civil Construction & Roads',
                        'description' => 'Motorway infrastructure, residential building projects, concrete formwork, masonry, and scaffolding.',
                        'icon' => 'fa-bridge'
                    ],
                    [
                        'title' => 'Food Processing, Meat & Agriculture',
                        'description' => 'Modern slaughterhouse processing, poultry packaging, bakery lines, and automated food canning.',
                        'icon' => 'fa-drumstick-bite'
                    ],
                    [
                        'title' => 'Warehouse Logistics & Forklift Operation',
                        'description' => 'Pan-European logistics hubs, order picking, automated dispatch, and reach truck operations.',
                        'icon' => 'fa-dolly'
                    ],
                    [
                        'title' => 'Hospitality, Hotel & Culinary Services',
                        'description' => 'Hotel line cooks, kitchen stewards, housekeeping personnel, and restaurant service teams.',
                        'icon' => 'fa-bell-concierge'
                    ]
                ],
                'sectors_bn' => [
                    [
                        'title' => 'ইউরোপীয় সিভিল কনস্ট্রাকশন ও রোডস',
                        'description' => 'মোটরওয়ে ইনফ্রাস্ট্রাকচার, রেসিডেন্সিয়াল বিল্ডিং প্রজেক্ট, কংক্রিট ফর্মওয়ার্ক, মেসনারি এবং স্ক্যাফোল্ডিং।',
                        'icon' => 'fa-bridge'
                    ],
                    [
                        'title' => 'ফুড প্রসেসিং, মিট ও এগ্রিকালচার',
                        'description' => 'আধুনিক স্লটারহাউস প্রসেসিং, পোল্ট্রি প্যাকেজিং, বেকারি লাইন এবং স্বয়ংক্রিয় ফুড ক্যানিং।',
                        'icon' => 'fa-drumstick-bite'
                    ],
                    [
                        'title' => 'ওয়্যারহাউস লজিস্টিকস ও ফর্কলিফ্ট অপারেশন',
                        'description' => 'প্যান-ইউরোপীয় লজিস্টিক হাব, অর্ডার পিকিং, স্বয়ংক্রিয় প্রেরণ এবং রিচ ট্রাক অপারেশন।',
                        'icon' => 'fa-dolly'
                    ],
                    [
                        'title' => 'হসপিটালিটি, হোটেল ও রন্ধনসম্পর্কীয় পরিষেবা',
                        'description' => 'হোটেল লাইন কুক, রান্নাঘরের স্টুয়ার্ড, হাউসকিপিং কর্মী এবং রেস্টুরেন্ট পরিষেবা দল।',
                        'icon' => 'fa-bell-concierge'
                    ]
                ],
                'worker_protections' => [
                    [
                        'title' => 'IGI Work Permit (Aviz de Munca)',
                        'description' => 'Official government work authorization issued under Romanian Law No. 200/2020 by the General Inspectorate for Immigration.',
                        'icon' => 'fa-certificate'
                    ],
                    [
                        'title' => 'European Standard Employment Contract',
                        'description' => 'Standard 40-hour work week, overtime compensation, paid annual holidays, and European national health coverage.',
                        'icon' => 'fa-handshake-angle'
                    ],
                    [
                        'title' => 'BMET Smart Card Clearance & Emigration',
                        'description' => 'Verified clearance through the Bureau of Manpower, Employment and Training (BMET) with legal flight clearance.',
                        'icon' => 'fa-plane-departure'
                    ]
                ],
                'worker_protections_bn' => [
                    [
                        'title' => 'আইজিআই ওয়ার্ক পারমিট (Aviz de Munca)',
                        'description' => 'রোমানিয়ার আইন নং 200/2020 এর অধীনে জেনারেল ইন্সপেক্টরেট ফর ইমিগ্রেশন দ্বারা জারি করা অফিসিয়াল সরকারি কাজের অনুমোদন।',
                        'icon' => 'fa-certificate'
                    ],
                    [
                        'title' => 'ইউরোপিয়ান স্ট্যান্ডার্ড এমপ্লয়মেন্ট কন্ট্রাক্ট',
                        'description' => 'স্ট্যান্ডার্ড 40-ঘন্টা কাজের সপ্তাহ, ওভারটাইম ক্ষতিপূরণ, অর্থপ্রদানের বার্ষিক ছুটি এবং ইউরোপীয় জাতীয় স্বাস্থ্য কভারেজ।',
                        'icon' => 'fa-handshake-angle'
                    ],
                    [
                        'title' => 'বিএমইটি স্মার্ট কার্ড ক্লিয়ারেন্স ও ইমিগ্রেশন',
                        'description' => 'আইনি ফ্লাইট ক্লিয়ারেন্স সহ জনশক্তি, কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো (বিএমইটি) এর মাধ্যমে যাচাইকৃত ক্লিয়ারেন্স।',
                        'icon' => 'fa-plane-departure'
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        foreach ($country_details as $country_detail) {
            CountryDetails::updateOrCreate(['id' => $country_detail['id']], $country_detail);
        }
    }
}
