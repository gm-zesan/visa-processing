<?php

namespace Database\Seeders;

use App\Models\VisaType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisaType::whereNotIn('id', [1, 2, 3, 4, 5])->delete();

        $visa_types = array(
            array(
                'id' => '1',
                'country_details_id' => '1',
                'name' => 'Maldives Work Permit Visa',
                'name_bn' => 'মালদ্বীপ ওয়ার্ক পারমিট ভিসা',
                'slug' => 'maldives-work-permit-visa',
                'visa_category' => 'Employment Work Permit',
                'visa_category_bn' => 'এমপ্লয়মেন্ট ওয়ার্ক পারমিট',
                'issuing_authority' => 'Ministry of Economic Development (MED) / Maldives Immigration',
                'issuing_authority_bn' => 'অর্থনৈতিক উন্নয়ন মন্ত্রণালয় (MED) / মালদ্বীপ ইমিগ্রেশন',
                'processing_time' => '30 - 45 Working Days',
                'processing_time_bn' => '৩০ - ৪৫ কর্মদিবস',
                'contract_period' => '2 Years (Renewable)',
                'contract_period_bn' => '২ বছর (নবায়নযোগ্য)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
                'emigration_clearance_bn' => 'বিএমইটি (BMET) স্মার্ট কার্ড বাধ্যতামূলক',
                'processing_steps' => [
                    [
                        'step' => '01',
                        'title' => 'Employer Demand & Quota Verification',
                        'description' => 'Verification of the Maldivian resort or company demand letter, approved government quota, and employment agreement.'
                    ],
                    [
                        'step' => '02',
                        'title' => 'Candidate Trade Interview & Medical Check',
                        'description' => 'Skill interview and mandatory medical fitness examination at an authorized diagnostic center.'
                    ],
                    [
                        'step' => '03',
                        'title' => 'Work Permit Approval & Visa Endorsement',
                        'description' => 'Submission to the Ministry of Economic Development (MED) for online work permit approval and entry visa issuance.'
                    ],
                    [
                        'step' => '04',
                        'title' => 'BMET Smart Card Emigration Clearance',
                        'description' => 'Formal registration with the Bureau of Manpower, Employment and Training (BMET), insurance registration, and Smart Card generation.'
                    ],
                    [
                        'step' => '05',
                        'title' => 'Pre-Departure Briefing & Flight Deployment',
                        'description' => 'Final orientation on Maldivian labor guidelines, air ticket issuance, and scheduled reception at Velana International Airport.'
                    ]
                ],
                'processing_steps_bn' => [
                    [
                        'step' => '01',
                        'title' => 'নিয়োগকর্তার চাহিদা এবং কোটা যাচাইকরণ',
                        'description' => 'মালদ্বীপের রিসোর্ট বা কোম্পানির ডিমান্ড লেটার, অনুমোদিত সরকারি কোটা এবং কর্মসংস্থান চুক্তির যাচাইকরণ।'
                    ],
                    [
                        'step' => '02',
                        'title' => 'প্রার্থী ট্রেড ইন্টারভিউ এবং মেডিকেল চেক',
                        'description' => 'একটি অনুমোদিত ডায়াগনস্টিক সেন্টারে দক্ষতা সাক্ষাৎকার এবং বাধ্যতামূলক মেডিকেল ফিটনেস পরীক্ষা।'
                    ],
                    [
                        'step' => '03',
                        'title' => 'ওয়ার্ক পারমিট অনুমোদন এবং ভিসা এনডোর্সমেন্ট',
                        'description' => 'অনলাইন ওয়ার্ক পারমিট অনুমোদন এবং এন্ট্রি ভিসা ইস্যুর জন্য অর্থনৈতিক উন্নয়ন মন্ত্রণালয়ে (MED) জমা দেওয়া।'
                    ],
                    [
                        'step' => '04',
                        'title' => 'বিএমইটি (BMET) স্মার্ট কার্ড ইমিগ্রেশন ক্লিয়ারেন্স',
                        'description' => 'জনশক্তি, কর্মসংস্থান ও প্রশিক্ষণ ব্যুরোর (BMET) সাথে আনুষ্ঠানিক নিবন্ধন, বীমা নিবন্ধন এবং স্মার্ট কার্ড তৈরি।'
                    ],
                    [
                        'step' => '05',
                        'title' => 'প্রি-ডিপার্চার ব্রিফিং এবং ফ্লাইট ডিপ্লয়মেন্ট',
                        'description' => 'মালদ্বীপের শ্রম নির্দেশিকাগুলির উপর চূড়ান্ত ওরিয়েন্টেশন, বিমানের টিকিট ইস্যু করা এবং ভেলানা আন্তর্জাতিক বিমানবন্দরে নির্ধারিত অভ্যর্থনা।'
                    ]
                ],
                'description' => '<p>The Maldives Work Permit Visa is an official authorization issued by the Ministry of Economic Development of Maldives enabling foreign nationals to undertake legal employment. Our agency coordinates authentic employer job quotas, work permit approvals, medical checkups, and entry visas.</p>
                <h3>Key Features & Facilities:</h3>
                <ul>
                    <li>Official work permit issued under Maldivian employment regulations.</li>
                    <li>Transparent employment contract detailing salary, benefits, and working hours.</li>
                    <li>Company-provided accommodation, meals, and medical coverage.</li>
                    <li>Complete guidance through pre-medical tests, visa stamping, and airport deployment.</li>
                </ul>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original valid passport (minimum 12 months validity).</li>
                    <li>Recent passport-size photographs with white background.</li>
                    <li>Medical fitness certificate from an authorized center.</li>
                    <li>Police Clearance Certificate.</li>
                </ul>',
                'description_bn' => '<p>মালদ্বীপ ওয়ার্ক পারমিট ভিসা হল মালদ্বীপের অর্থনৈতিক উন্নয়ন মন্ত্রণালয় কর্তৃক জারি করা একটি অফিসিয়াল অনুমোদন যা বিদেশী নাগরিকদের আইনি কর্মসংস্থান গ্রহণের অনুমতি দেয়। আমাদের সংস্থা প্রকৃত নিয়োগকর্তার কাজের কোটা, ওয়ার্ক পারমিট অনুমোদন, মেডিকেল চেকআপ এবং এন্ট্রি ভিসার সমন্বয় করে।</p>
                <h3>প্রধান বৈশিষ্ট্য ও সুবিধা:</h3>
                <ul>
                    <li>মালদ্বীপের কর্মসংস্থান প্রবিধানের অধীনে জারি করা অফিসিয়াল ওয়ার্ক পারমিট।</li>
                    <li>বেতন, সুবিধা এবং কাজের সময় বিস্তারিত স্বচ্ছ কর্মসংস্থান চুক্তি।</li>
                    <li>কোম্পানি-প্রদত্ত আবাসন, খাবার এবং চিকিৎসা কভারেজ।</li>
                    <li>প্রি-মেডিকেল টেস্ট, ভিসা স্ট্যাম্পিং এবং এয়ারপোর্ট ডিপ্লয়মেন্টের মাধ্যমে সম্পূর্ণ নির্দেশিকা।</li>
                </ul>
                <h3>প্রয়োজনীয় নথিপত্র:</h3>
                <ul>
                    <li>মূল বৈধ পাসপোর্ট (ন্যূনতম ১২ মাসের মেয়াদ)।</li>
                    <li>সাদা পটভূমি সহ সাম্প্রতিক পাসপোর্ট আকারের ছবি।</li>
                    <li>একটি অনুমোদিত কেন্দ্র থেকে মেডিকেল ফিটনেস শংসাপত্র।</li>
                    <li>পুলিশ ক্লিয়ারেন্স সার্টিফিকেট।</li>
                </ul>',
                'image' => 'upload/visa_type/visa_1_maldives.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'country_details_id' => '2',
                'name' => 'Saudi Arabia Work Permit Visa',
                'name_bn' => 'সৌদি আরব ওয়ার্ক পারমিট ভিসা',
                'slug' => 'saudi-arabia-work-permit-visa',
                'visa_category' => 'Employment Work Permit (Iqama Visa)',
                'visa_category_bn' => 'এমপ্লয়মেন্ট ওয়ার্ক পারমিট (ইকামা ভিসা)',
                'issuing_authority' => 'Ministry of Human Resources and Social Development (Qiwa & Musaned)',
                'issuing_authority_bn' => 'মানবসম্পদ ও সামাজিক উন্নয়ন মন্ত্রণালয় (কিওয়া ও মুসানেদ)',
                'processing_time' => '30 - 40 Working Days',
                'processing_time_bn' => '৩০ - ৪০ কর্মদিবস',
                'contract_period' => '2 Years (Renewable)',
                'contract_period_bn' => '২ বছর (নবায়নযোগ্য)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
                'emigration_clearance_bn' => 'বিএমইটি (BMET) স্মার্ট কার্ড বাধ্যতামূলক',
                'processing_steps' => [
                    [
                        'step' => '01',
                        'title' => 'Qiwa Electronic Demand Letter & Quota Verification',
                        'description' => 'Sponsoring employer issues verified electronic job offer via Qiwa or Musaned portal with government-backed terms.'
                    ],
                    [
                        'step' => '02',
                        'title' => 'Trade Test & GAMCA Medical Clearance',
                        'description' => 'Trade skill assessment and mandatory biometric medical screening at GCC GAMCA authorized centers.'
                    ],
                    [
                        'step' => '03',
                        'title' => 'Saudi Embassy Visa Stamping & Wakala',
                        'description' => 'Electronic power of attorney (Wakala) submission and physical visa stamping at the Saudi Embassy in Dhaka.'
                    ],
                    [
                        'step' => '04',
                        'title' => 'BMET Emigration Smart Card Clearance',
                        'description' => 'Government clearance through BMET, wage protection briefing, overseas welfare fund, and Smart Card generation.'
                    ],
                    [
                        'step' => '05',
                        'title' => 'Pre-Departure Briefing & Flight Deployment',
                        'description' => 'Flight ticketing, pre-departure orientation on Saudi Labor Law, and airport reception in Riyadh, Jeddah, or Dammam.'
                    ]
                ],
                'processing_steps_bn' => [
                    [
                        'step' => '01',
                        'title' => 'কিওয়া ইলেকট্রনিক ডিমান্ড লেটার এবং কোটা যাচাইকরণ',
                        'description' => 'স্পনসরকারী নিয়োগকর্তা সরকারি-সমর্থিত শর্তাবলী সহ কিওয়া বা মুসানেদ পোর্টালের মাধ্যমে যাচাইকৃত ইলেকট্রনিক কাজের অফার জারি করে।'
                    ],
                    [
                        'step' => '02',
                        'title' => 'ট্রেড টেস্ট এবং গামকা (GAMCA) মেডিকেল ক্লিয়ারেন্স',
                        'description' => 'জিসিসি গামকা (GCC GAMCA) অনুমোদিত কেন্দ্রগুলিতে ট্রেড দক্ষতা মূল্যায়ন এবং বাধ্যতামূলক বায়োমেট্রিক মেডিকেল স্ক্রীনিং।'
                    ],
                    [
                        'step' => '03',
                        'title' => 'সৌদি দূতাবাস ভিসা স্ট্যাম্পিং এবং ওয়াকালা',
                        'description' => 'ঢাকায় সৌদি দূতাবাসে ইলেকট্রনিক পাওয়ার অফ অ্যাটর্নি (ওয়াকালা) জমা দেওয়া এবং শারীরিক ভিসা স্ট্যাম্পিং।'
                    ],
                    [
                        'step' => '04',
                        'title' => 'বিএমইটি (BMET) ইমিগ্রেশন স্মার্ট কার্ড ক্লিয়ারেন্স',
                        'description' => 'বিএমইটি-এর মাধ্যমে সরকারি ক্লিয়ারেন্স, মজুরি সুরক্ষা ব্রিফিং, বিদেশী কল্যাণ তহবিল এবং স্মার্ট কার্ড তৈরি।'
                    ],
                    [
                        'step' => '05',
                        'title' => 'প্রি-ডিপার্চার ব্রিফিং এবং ফ্লাইট ডিপ্লয়মেন্ট',
                        'description' => 'ফ্লাইট টিকেটিং, সৌদি শ্রম আইনের উপর প্রি-ডিপার্চার ওরিয়েন্টেশন এবং রিয়াদ, জেদ্দা বা দাম্মামে বিমানবন্দর অভ্যর্থনা।'
                    ]
                ],
                'description' => '<p>The Saudi Arabia Work Permit Visa (Employment Visa) provides official legal work authorization in the Kingdom under the Qiwa and Musaned systems. We connect job seekers with verified Saudi employers and manage the entire visa lifecycle smoothly and efficiently.</p>
                <h3>Key Features & Facilities:</h3>
                <ul>
                    <li>Verified electronic work visa approval and government-approved contract.</li>
                    <li>Fixed monthly basic salary plus overtime benefits according to Saudi Labor Law.</li>
                    <li>Employer-sponsored Iqama (Resident Identity), medical insurance, and accommodation.</li>
                    <li>GAMCA medical test assistance, Saudi embassy visa endorsement, and BMET smart card processing.</li>
                </ul>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original passport valid for at least 6 months.</li>
                    <li>GAMCA Medical fitness fit certificate.</li>
                    <li>Police clearance certificate verified by Foreign Ministry.</li>
                    <li>Passport size photos on white background.</li>
                </ul>',
                'description_bn' => '<p>সৌদি আরব ওয়ার্ক পারমিট ভিসা (এমপ্লয়মেন্ট ভিসা) কিওয়া এবং মুসানেদ সিস্টেমের অধীনে কিংডমে অফিসিয়াল আইনি কাজের অনুমোদন প্রদান করে। আমরা যাচাইকৃত সৌদি নিয়োগকর্তাদের সাথে চাকরিপ্রার্থীদের সংযুক্ত করি এবং সম্পূর্ণ ভিসা জীবনচক্র মসৃণ এবং দক্ষতার সাথে পরিচালনা করি।</p>
                <h3>প্রধান বৈশিষ্ট্য ও সুবিধা:</h3>
                <ul>
                    <li>যাচাইকৃত ইলেকট্রনিক ওয়ার্ক ভিসা অনুমোদন এবং সরকার-অনুমোদিত চুক্তি।</li>
                    <li>সৌদি শ্রম আইন অনুযায়ী নির্দিষ্ট মাসিক মূল বেতন এবং অতিরিক্ত সময় সুবিধা।</li>
                    <li>নিয়োগকর্তা-স্পনসরকৃত ইকামা (আবাসিক পরিচয়), চিকিৎসা বীমা এবং আবাসন।</li>
                    <li>গামকা মেডিকেল টেস্ট সহায়তা, সৌদি দূতাবাস ভিসা অনুমোদন এবং বিএমইটি স্মার্ট কার্ড প্রক্রিয়াকরণ।</li>
                </ul>
                <h3>প্রয়োজনীয় নথিপত্র:</h3>
                <ul>
                    <li>কমপক্ষে ৬ মাসের জন্য বৈধ মূল পাসপোর্ট।</li>
                    <li>গামকা মেডিকেল ফিটনেস ফিট সার্টিফিকেট।</li>
                    <li>পররাষ্ট্র মন্ত্রণালয় কর্তৃক যাচাইকৃত পুলিশ ক্লিয়ারেন্স সার্টিফিকেট।</li>
                    <li>সাদা পটভূমিতে পাসপোর্ট আকারের ছবি।</li>
                </ul>',
                'image' => 'upload/visa_type/visa_2_saudi.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'country_details_id' => '3',
                'name' => 'Dubai (UAE) Work Permit Visa',
                'name_bn' => 'দুবাই (সংযুক্ত আরব আমিরাত) ওয়ার্ক পারমিট ভিসা',
                'slug' => 'dubai-uae-work-permit-visa',
                'visa_category' => 'MOHRE Employment Residence Visa',
                'visa_category_bn' => 'মোহরে (MOHRE) এমপ্লয়মেন্ট রেসিডেন্স ভিসা',
                'issuing_authority' => 'Ministry of Human Resources and Emiratisation (MOHRE) & GDRFA',
                'issuing_authority_bn' => 'মানবসম্পদ ও আমিরাতীকরণ মন্ত্রণালয় (MOHRE) এবং GDRFA',
                'processing_time' => '25 - 35 Working Days',
                'processing_time_bn' => '২৫ - ৩৫ কর্মদিবস',
                'contract_period' => '2 Years (Renewable)',
                'contract_period_bn' => '২ বছর (নবায়নযোগ্য)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
                'emigration_clearance_bn' => 'বিএমইটি (BMET) স্মার্ট কার্ড বাধ্যতামূলক',
                'processing_steps' => [
                    [
                        'step' => '01',
                        'title' => 'MOHRE Quota Allocation & Electronic Offer Letter',
                        'description' => 'UAE employer applies for MOHRE quota approval and issues standard electronic employment contract (Job Offer).'
                    ],
                    [
                        'step' => '02',
                        'title' => 'Employment Entry Permit Issuance (e-Visa)',
                        'description' => 'General Directorate of Residency and Foreigners Affairs (GDRFA) issues the formal employment entry permit.'
                    ],
                    [
                        'step' => '03',
                        'title' => 'Medical Clearance & Security Screening',
                        'description' => 'Required medical examination and statutory security clearances coordinated by authorized manpower channels.'
                    ],
                    [
                        'step' => '04',
                        'title' => 'BMET Emigration Smart Card Clearance',
                        'description' => 'Registration with Bureau of Manpower, Employment and Training (BMET), immigration briefing, and Smart Card issue.'
                    ],
                    [
                        'step' => '05',
                        'title' => 'Deployment & On-Arrival Emirates ID Stamping',
                        'description' => 'Flight dispatch, reception in Dubai/Abu Dhabi, biometric Emirates ID registration, and labor residence card stamping.'
                    ]
                ],
                'processing_steps_bn' => [
                    [
                        'step' => '01',
                        'title' => 'মোহরে কোটা বরাদ্দ এবং ইলেকট্রনিক অফার লেটার',
                        'description' => 'সংযুক্ত আরব আমিরাতের নিয়োগকর্তা মোহরে কোটা অনুমোদনের জন্য আবেদন করে এবং মানক ইলেকট্রনিক কর্মসংস্থান চুক্তি (জব অফার) জারি করে।'
                    ],
                    [
                        'step' => '02',
                        'title' => 'কর্মসংস্থান এন্ট্রি পারমিট ইস্যু (ই-ভিসা)',
                        'description' => 'জেনারেল ডিরেক্টরেট অফ রেসিডেন্সি অ্যান্ড ফরেনার্স অ্যাফেয়ার্স (GDRFA) আনুষ্ঠানিক কর্মসংস্থান এন্ট্রি পারমিট জারি করে।'
                    ],
                    [
                        'step' => '03',
                        'title' => 'মেডিকেল ক্লিয়ারেন্স এবং সিকিউরিটি স্ক্রীনিং',
                        'description' => 'অনুমোদিত জনশক্তি চ্যানেলগুলির দ্বারা সমন্বিত প্রয়োজনীয় মেডিকেল পরীক্ষা এবং বিধিবদ্ধ নিরাপত্তা ছাড়পত্র।'
                    ],
                    [
                        'step' => '04',
                        'title' => 'বিএমইটি (BMET) ইমিগ্রেশন স্মার্ট কার্ড ক্লিয়ারেন্স',
                        'description' => 'জনশক্তি, কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো (BMET) এর সাথে নিবন্ধন, ইমিগ্রেশন ব্রিফিং এবং স্মার্ট কার্ড ইস্যু।'
                    ],
                    [
                        'step' => '05',
                        'title' => 'ডিপ্লয়মেন্ট এবং অন-অ্যারাইভাল এমিরেটস আইডি স্ট্যাম্পিং',
                        'description' => 'ফ্লাইট প্রেরণ, দুবাই/আবুধাবিতে অভ্যর্থনা, বায়োমেট্রিক এমিরেটস আইডি নিবন্ধন এবং শ্রম আবাসিক কার্ড স্ট্যাম্পিং।'
                    ]
                ],
                'description' => '<p>The Dubai (UAE) Work Permit Visa is issued in collaboration with the Ministry of Human Resources and Emiratisation (MOHRE) and the General Directorate of Residency and Foreigners Affairs (GDRFA). We provide verified overseas employment visas for Dubai, Abu Dhabi, and other Emirates.</p>
                <h3>Key Features & Facilities:</h3>
                <ul>
                    <li>MOHRE approved electronic employment entry permit.</li>
                    <li>Comprehensive package including Emirates ID issuance, medical residency screening, and labor card.</li>
                    <li>Accommodation, transport allowance, health insurance, and end-of-service gratuity.</li>
                    <li>Fast processing time with complete transparency and BMET immigration clearance.</li>
                </ul>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original valid passport with sufficient blank pages.</li>
                    <li>Digital passport photos with white background.</li>
                    <li>Attested educational or technical certificates (if applicable).</li>
                    <li>Government medical and security clearances.</li>
                </ul>',
                'description_bn' => '<p>দুবাই (সংযুক্ত আরব আমিরাত) ওয়ার্ক পারমিট ভিসা মানবসম্পদ ও আমিরাতীকরণ মন্ত্রণালয় (MOHRE) এবং জেনারেল ডিরেক্টরেট অফ রেসিডেন্সি অ্যান্ড ফরেনার্স অ্যাফেয়ার্স (GDRFA) এর সহযোগিতায় জারি করা হয়। আমরা দুবাই, আবুধাবি এবং অন্যান্য আমিরাতের জন্য যাচাইকৃত বিদেশী কর্মসংস্থান ভিসা প্রদান করি।</p>
                <h3>প্রধান বৈশিষ্ট্য ও সুবিধা:</h3>
                <ul>
                    <li>মোহরে অনুমোদিত ইলেকট্রনিক এমপ্লয়মেন্ট এন্ট্রি পারমিট।</li>
                    <li>এমিরেটস আইডি ইস্যু, মেডিকেল রেসিডেন্সি স্ক্রীনিং এবং লেবার কার্ড সহ ব্যাপক প্যাকেজ।</li>
                    <li>আবাসন, পরিবহন ভাতা, স্বাস্থ্য বীমা এবং এন্ড-অফ-সার্ভিস গ্র্যাচুইটি।</li>
                    <li>সম্পূর্ণ স্বচ্ছতা এবং বিএমইটি ইমিগ্রেশন ক্লিয়ারেন্স সহ দ্রুত প্রক্রিয়াকরণ সময়।</li>
                </ul>
                <h3>প্রয়োজনীয় নথিপত্র:</h3>
                <ul>
                    <li>পর্যাপ্ত ফাঁকা পাতা সহ আসল বৈধ পাসপোর্ট।</li>
                    <li>সাদা ব্যাকগ্রাউন্ড সহ ডিজিটাল পাসপোর্ট সাইজের ছবি।</li>
                    <li>সত্যায়িত শিক্ষাগত বা প্রযুক্তিগত প্রশংসাপত্র (যদি প্রযোজ্য হয়)।</li>
                    <li>সরকারি চিকিৎসা ও নিরাপত্তা ছাড়পত্র।</li>
                </ul>',
                'image' => 'upload/visa_type/visa_3_uae.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'country_details_id' => '4',
                'name' => 'Malaysia Work Permit Visa',
                'name_bn' => 'মালয়েশিয়া ওয়ার্ক পারমিট ভিসা',
                'slug' => 'malaysia-work-permit-visa',
                'visa_category' => 'Calling Visa / Visa with Reference (VDR)',
                'visa_category_bn' => 'কলিং ভিসা / ভিসা উইথ রেফারেন্স (VDR)',
                'issuing_authority' => 'Immigration Department of Malaysia & Ministry of Human Resources',
                'issuing_authority_bn' => 'মালয়েশিয়ার ইমিগ্রেশন বিভাগ এবং মানবসম্পদ মন্ত্রণালয়',
                'processing_time' => '45 - 60 Working Days',
                'processing_time_bn' => '৪৫ - ৬০ কর্মদিবস',
                'contract_period' => '2 Years (Renewable up to 5 Years)',
                'contract_period_bn' => '২ বছর (৫ বছর পর্যন্ত নবায়নযোগ্য)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
                'emigration_clearance_bn' => 'বিএমইটি (BMET) স্মার্ট কার্ড বাধ্যতামূলক',
                'processing_steps' => [
                    [
                        'step' => '01',
                        'title' => 'Malaysian Immigration Calling Visa (VDR) Approval',
                        'description' => 'Employer submits verified quota to the Malaysian Immigration Department to generate the official Calling Visa reference.'
                    ],
                    [
                        'step' => '02',
                        'title' => 'FOMEMA Pre-Medical & Biometric Registration',
                        'description' => 'Candidate undertakes specialized pre-medical examination and biometric logging at authorized medical centers.'
                    ],
                    [
                        'step' => '03',
                        'title' => 'Malaysian High Commission Visa Endorsement',
                        'description' => 'Submission of VDR approval letter and passport to the Malaysian High Commission in Dhaka for single entry visa stamping.'
                    ],
                    [
                        'step' => '04',
                        'title' => 'BMET Emigration Clearance & Smart Card',
                        'description' => 'Official departure verification through Bureau of Manpower, Employment and Training (BMET) with insurance card.'
                    ],
                    [
                        'step' => '05',
                        'title' => 'Departure & FOMEMA Stamping in Kuala Lumpur',
                        'description' => 'Flight deployment to KLIA, coordinated employer pickup, on-arrival FOMEMA screening, and Visit Pass (Temporary Employment - PLKS).'
                    ]
                ],
                'processing_steps_bn' => [
                    [
                        'step' => '01',
                        'title' => 'মালয়েশিয়ার ইমিগ্রেশন কলিং ভিসা (VDR) অনুমোদন',
                        'description' => 'অফিসিয়াল কলিং ভিসা রেফারেন্স তৈরি করতে নিয়োগকর্তা মালয়েশিয়ার ইমিগ্রেশন বিভাগে যাচাইকৃত কোটা জমা দেন।'
                    ],
                    [
                        'step' => '02',
                        'title' => 'ফোমেমা (FOMEMA) প্রি-মেডিকেল এবং বায়োমেট্রিক রেজিস্ট্রেশন',
                        'description' => 'প্রার্থী অনুমোদিত মেডিকেল সেন্টারে বিশেষায়িত প্রি-মেডিকেল পরীক্ষা এবং বায়োমেট্রিক লগিং গ্রহণ করে।'
                    ],
                    [
                        'step' => '03',
                        'title' => 'মালয়েশিয়ান হাইকমিশন ভিসা এনডোর্সমেন্ট',
                        'description' => 'সিঙ্গেল এন্ট্রি ভিসা স্ট্যাম্পিংয়ের জন্য ঢাকায় মালয়েশিয়ান হাইকমিশনে ভিডিআর (VDR) অনুমোদন পত্র এবং পাসপোর্ট জমা দেওয়া।'
                    ],
                    [
                        'step' => '04',
                        'title' => 'বিএমইটি (BMET) ইমিগ্রেশন ক্লিয়ারেন্স এবং স্মার্ট কার্ড',
                        'description' => 'বীমা কার্ড সহ জনশক্তি, কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো (BMET) এর মাধ্যমে অফিসিয়াল প্রস্থান যাচাইকরণ।'
                    ],
                    [
                        'step' => '05',
                        'title' => 'কুয়ালালামপুরে ডিপার্চার এবং ফোমেমা स्ट্যাম্পিং',
                        'description' => 'KLIA-তে ফ্লাইট ডিপ্লয়মেন্ট, সমন্বিত নিয়োগকর্তার পিকআপ, অন-অ্যারাইভাল ফোমেমা স্ক্রীনিং এবং ভিজিট পাস (অস্থায়ী কর্মসংস্থান - PLKS)।'
                    ]
                ],
                'description' => '<p>The Malaysia Work Permit Visa (Calling Visa / Visa with Reference - VDR) authorizes foreign workers to be legally employed across designated economic sectors in Malaysia. Our agency strictly complies with the bilateral manpower agreements and Malaysian Immigration protocols.</p>
                <h3>Key Features & Facilities:</h3>
                <ul>
                    <li>Approved Malaysian Calling Visa (VDR) issued by Malaysian Immigration.</li>
                    <li>Official contract with structured wages, standard working hours, and medical protection.</li>
                    <li>Employer-provided accommodation complying with housing standards (Act 446).</li>
                    <li>Comprehensive support covering biometric medical checkups, visa stamping, and flight clearance.</li>
                </ul>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original passport valid for at least 18 months.</li>
                    <li>Medical fitness certificate from authorized diagnostic clinic.</li>
                    <li>Police Clearance Certificate.</li>
                    <li>Passport photos with white background.</li>
                </ul>',
                'description_bn' => '<p>মালয়েশিয়া ওয়ার্ক পারমিট ভিসা (কলিং ভিসা / ভিসা উইথ রেফারেন্স - VDR) বিদেশী কর্মীদের মালয়েশিয়ার মনোনীত অর্থনৈতিক খাত জুড়ে বৈধভাবে নিযুক্ত হওয়ার অনুমোদন দেয়। আমাদের সংস্থা দ্বিপাক্ষিক জনশক্তি চুক্তি এবং মালয়েশিয়ার ইমিগ্রেশন প্রোটোকল কঠোরভাবে মেনে চলে।</p>
                <h3>প্রধান বৈশিষ্ট্য ও সুবিধা:</h3>
                <ul>
                    <li>মালয়েশিয়ান ইমিগ্রেশন দ্বারা জারি করা অনুমোদিত মালয়েশিয়ান কলিং ভিসা (VDR)।</li>
                    <li>গঠনমূলক মজুরি, মানসম্মত কাজের সময় এবং চিকিৎসা সুরক্ষা সহ অফিসিয়াল চুক্তি।</li>
                    <li>আবাসন মান (অ্যাক্ট 446) মেনে চলা নিয়োগকর্তা-প্রদত্ত আবাসন।</li>
                    <li>বায়োমেট্রিক মেডিকেল চেকআপ, ভিসা স্ট্যাম্পিং এবং ফ্লাইট ক্লিয়ারেন্স কভার করে ব্যাপক সমর্থন।</li>
                </ul>
                <h3>প্রয়োজনীয় নথিপত্র:</h3>
                <ul>
                    <li>আসল পাসপোর্ট কমপক্ষে ১৮ মাসের জন্য বৈধ।</li>
                    <li>অনুমোদিত ডায়াগনস্টিক ক্লিনিক থেকে মেডিকেল ফিটনেস শংসাপত্র।</li>
                    <li>পুলিশ ক্লিয়ারেন্স সার্টিফিকেট।</li>
                    <li>সাদা পটভূমি সহ পাসপোর্ট আকারের ছবি।</li>
                </ul>',
                'image' => 'upload/visa_type/visa_4_malaysia.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'country_details_id' => '5',
                'name' => 'Romania Work Permit Visa',
                'name_bn' => 'রোমানিয়া ওয়ার্ক পারমিট ভিসা',
                'slug' => 'romania-work-permit-visa',
                'visa_category' => 'European Union Work Permit (Aviz de Munca)',
                'visa_category_bn' => 'ইউরোপিয়ান ইউনিয়ন ওয়ার্ক পারমিট (Aviz de Munca)',
                'issuing_authority' => 'General Inspectorate for Immigration (IGI) & Romanian Ministry of Labor',
                'issuing_authority_bn' => 'জেনারেল ইন্সপেক্টরেট ফর ইমিগ্রেশন (IGI) এবং রোমানিয়ার শ্রম মন্ত্রণালয়',
                'processing_time' => '60 - 90 Working Days',
                'processing_time_bn' => '৬০ - ৯০ কর্মদিবস',
                'contract_period' => '1 to 2 Years (Renewable with Pathway to EU Residency)',
                'contract_period_bn' => '১ থেকে ২ বছর (ইইউ রেসিডেন্সির পথ সহ নবায়নযোগ্য)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
                'emigration_clearance_bn' => 'বিএমইটি (BMET) স্মার্ট কার্ড বাধ্যতামূলক',
                'processing_steps' => [
                    [
                        'step' => '01',
                        'title' => 'IGI Romania Work Permit Issuance (Aviz de Munca)',
                        'description' => 'Sponsoring Romanian employer submits petition to the General Inspectorate for Immigration (IGI) to obtain official work permit approval.'
                    ],
                    [
                        'step' => '02',
                        'title' => 'Document Apostille & Legal Translation',
                        'description' => 'Apostille certification and verified Romanian translation of candidate credentials and police clearances.'
                    ],
                    [
                        'step' => '03',
                        'title' => 'Romanian Embassy Long-Stay Visa (D/AM) Stamping',
                        'description' => 'Submission of original Aviz de Munca, flight reservation, and verified file to the Embassy of Romania for visa stamping.'
                    ],
                    [
                        'step' => '04',
                        'title' => 'BMET Emigration Clearance & Smart Card',
                        'description' => 'Registration with Bureau of Manpower, Employment and Training (BMET), immigration briefing, and Smart Card generation.'
                    ],
                    [
                        'step' => '05',
                        'title' => 'Flight Deployment & Romanian Residence Card (Permis de Sedere)',
                        'description' => 'Flight departure to Bucharest (OTP), employer reception, and biometric registration for Romanian Residence Permit.'
                    ]
                ],
                'processing_steps_bn' => [
                    [
                        'step' => '01',
                        'title' => 'আইজিআই রোমানিয়া ওয়ার্ক পারমিট প্রদান (Aviz de Munca)',
                        'description' => 'স্পনসরকারী রোমানিয়ান নিয়োগকর্তা অফিসিয়াল ওয়ার্ক পারমিট অনুমোদন পাওয়ার জন্য জেনারেল ইন্সপেক্টরেট ফর ইমিগ্রেশন (IGI) এর কাছে আবেদন জমা দেন।'
                    ],
                    [
                        'step' => '02',
                        'title' => 'ডকুমেন্ট অ্যাপোস্টিল এবং লিগ্যাল ট্রান্সলেশন',
                        'description' => 'অ্যাপোস্টিল সার্টিফিকেশন এবং প্রার্থীর প্রমাণপত্র এবং পুলিশ ক্লিয়ারেন্সের যাচাইকৃত রোমানিয়ান অনুবাদ।'
                    ],
                    [
                        'step' => '03',
                        'title' => 'রোমানিয়ান দূতাবাস লং-স্টে ভিসা (D/AM) স্ট্যাম্পিং',
                        'description' => 'ভিসা স্ট্যাম্পিংয়ের জন্য রোমানিয়ার দূতাবাসে আসল আভিজ ডি মুঙ্কা (Aviz de Munca), ফ্লাইট রিজার্ভেশন এবং যাচাইকৃত ফাইল জমা দেওয়া।'
                    ],
                    [
                        'step' => '04',
                        'title' => 'বিএমইটি (BMET) ইমিগ্রেশন ক্লিয়ারেন্স এবং স্মার্ট কার্ড',
                        'description' => 'জনশক্তি, কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো (BMET) এর সাথে নিবন্ধন, ইমিগ্রেশন ব্রিফিং এবং স্মার্ট কার্ড তৈরি।'
                    ],
                    [
                        'step' => '05',
                        'title' => 'ফ্লাইট ডিপ্লয়মেন্ট এবং রোমানিয়ান রেসিডেন্স কার্ড (Permis de Sedere)',
                        'description' => 'বুখারেস্টে (OTP) ফ্লাইট প্রস্থান, নিয়োগকর্তার অভ্যর্থনা এবং রোমানিয়ান রেসিডেন্স পারমিটের জন্য বায়োমেট্রিক নিবন্ধন।'
                    ]
                ],
                'description' => '<p>The Romania Work Permit Visa (Aviz de Munca / Long-Stay D/AM Visa) allows skilled and semi-skilled workers to build careers in the European Union under Romanian immigration law. We manage the full process from immigration quota approval in Bucharest to embassy endorsement in Dhaka.</p>
                <h3>Key Features & Facilities:</h3>
                <ul>
                    <li>Genuine Work Permit (Aviz de Munca) issued by the General Inspectorate for Immigration.</li>
                    <li>Official contract with structured working hours, overtime rates, and European medical insurance.</li>
                    <li>Employer-provided accommodation, utility allowances, and airport welcome in Romania.</li>
                    <li>Direct pathway to renewable European residency and career growth in the EU.</li>
                </ul>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original passport valid for at least 18 months.</li>
                    <li>Police Clearance Certificate attested by Foreign Ministry.</li>
                    <li>Medical fitness certificate from an authorized center.</li>
                    <li>Passport photos complying with European visa standards.</li>
                </ul>',
                'description_bn' => '<p>রোমানিয়া ওয়ার্ক পারমিট ভিসা (Aviz de Munca / Long-Stay D/AM Visa) দক্ষ এবং আধা-দক্ষ কর্মীদের রোমানিয়ান ইমিগ্রেশন আইনের অধীনে ইউরোপীয় ইউনিয়নে ক্যারিয়ার গড়ার অনুমতি দেয়। আমরা বুখারেস্টে ইমিগ্রেশন কোটা অনুমোদন থেকে ঢাকায় দূতাবাস এনডোর্সমেন্ট পর্যন্ত সম্পূর্ণ প্রক্রিয়া পরিচালনা করি।</p>
                <h3>প্রধান বৈশিষ্ট্য ও সুবিধা:</h3>
                <ul>
                    <li>জেনারেল ইন্সপেক্টরেট ফর ইমিগ্রেশন দ্বারা জারি করা জেনুইন ওয়ার্ক পারমিট (Aviz de Munca)।</li>
                    <li>গঠনমূলক কাজের সময়, ওভারটাইম রেট এবং ইউরোপীয় চিকিৎসা বীমা সহ অফিসিয়াল চুক্তি।</li>
                    <li>নিয়োগকর্তা-প্রদত্ত আবাসন, ইউটিলিটি ভাতা এবং রোমানিয়াতে বিমানবন্দরে স্বাগত।</li>
                    <li>নবায়নযোগ্য ইউরোপীয় রেসিডেন্সি এবং ইইউ-তে ক্যারিয়ার বৃদ্ধির সরাসরি পথ।</li>
                </ul>
                <h3>প্রয়োজনীয় নথিপত্র:</h3>
                <ul>
                    <li>আসল পাসপোর্ট কমপক্ষে ১৮ মাসের জন্য বৈধ।</li>
                    <li>পররাষ্ট্র মন্ত্রণালয় কর্তৃক সত্যায়িত পুলিশ ক্লিয়ারেন্স সার্টিফিকেট।</li>
                    <li>একটি অনুমোদিত কেন্দ্র থেকে মেডিকেল ফিটনেস শংসাপত্র।</li>
                    <li>ইউরোপীয় ভিসা মান মেনে চলা পাসপোর্ট সাইজের ছবি।</li>
                </ul>',
                'image' => 'upload/visa_type/visa_5_romania.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        foreach ($visa_types as $visa_type) {
            VisaType::updateOrCreate(['id' => $visa_type['id']], $visa_type);
        }
    }
}
