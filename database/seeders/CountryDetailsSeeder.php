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
                'language' => 'Dhivehi & English',
                'processing_time' => '30 - 45 Working Days',
                'description' => '<p>The Maldives offers exceptional overseas employment opportunities with comprehensive work permit and legal employment authorization. We provide end-to-end recruitment assistance, verified employment contracts, work permit processing, and legal deployment for candidates seeking careers in the Maldives.</p><p>All candidates receive complete assistance with Ministry of Economic Development work permit approval, medical clearances, visa stamping, and pre-departure briefings.</p>',
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
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'country_id' => '682', // Saudi Arabia
                'image' => 'upload/country/country_2_saudi.jpg',
                'subtitle' => 'Kingdom of Saudi Arabia Vision 2030 Employment Guide',
                'language' => 'Arabic & English',
                'processing_time' => '30 - 40 Working Days',
                'description' => '<p>The Kingdom of Saudi Arabia remains one of the largest global employment hubs with massive infrastructure and economic expansion under Vision 2030. We facilitate authentic work permit visas under the Qiwa and Musaned government platforms, ensuring full legal protection, transparent employment contracts, and prompt processing.</p><p>We guide applicants through GAMCA medical fitness tests, Saudi embassy visa stamping, BMET smart card clearance, and flight deployment.</p>',
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
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'country_id' => '784', // United Arab Emirates (Dubai)
                'image' => 'upload/country/country_3_uae.jpg',
                'subtitle' => 'Dubai & United Arab Emirates Career & Living Guide',
                'language' => 'Arabic & English',
                'processing_time' => '25 - 35 Working Days',
                'description' => '<p>Dubai and the United Arab Emirates provide vibrant overseas job opportunities with competitive tax-free earnings and world-class living standards. Our agency connects prospective workers with government-registered UAE employers offering official MOHRE employment entry permits and residence work visas.</p><p>We handle the complete cycle including entry permit issuance, medical screening, Emirates ID processing, BMET clearance, and overseas deployment.</p>',
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
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'country_id' => '458', // Malaysia
                'image' => 'upload/country/country_4_malaysia.jpg',
                'subtitle' => 'Official Malaysia Calling Visa & Industrial Recruitment Guide',
                'language' => 'Malay & English',
                'processing_time' => '45 - 60 Working Days',
                'description' => '<p>Malaysia is a premier destination for overseas employment across key industrial and service sectors. We process genuine Malaysian Calling Visas (Visa with Reference - VDR) in strict compliance with the Malaysian Ministry of Human Resources and Immigration Department regulations.</p><p>Our services include verified quota allocations, FOMEMA medical coordination, Malaysian High Commission visa endorsement, and government flight clearance.</p>',
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
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'country_id' => '642', // Romania
                'image' => 'upload/country/country_5_romania.jpg',
                'subtitle' => 'European Union Work Permit & Living Guide (Romania)',
                'language' => 'Romanian & English',
                'processing_time' => '60 - 90 Working Days',
                'description' => '<p>Romania is an emerging European destination offering excellent career prospects and pathways to European residency. We facilitate legal Romanian Work Permits (Aviz de Munca) issued directly by the General Inspectorate for Immigration (IGI).</p><p>We provide comprehensive support covering work permit issuance from Romania, Romanian Embassy long-stay work visa (D/AM) stamping, apostille documentation, and pre-departure arrangements.</p>',
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
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        foreach ($country_details as $country_detail) {
            CountryDetails::updateOrCreate(['id' => $country_detail['id']], $country_detail);
        }
    }
}
