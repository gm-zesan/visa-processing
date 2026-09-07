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
                'slug' => 'maldives-work-permit-visa',
                'visa_category' => 'Employment Work Permit',
                'issuing_authority' => 'Ministry of Economic Development (MED) / Maldives Immigration',
                'processing_time' => '30 - 45 Working Days',
                'contract_period' => '2 Years (Renewable)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
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
                'image' => 'upload/visa_type/visa_1_maldives.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'country_details_id' => '2',
                'name' => 'Saudi Arabia Work Permit Visa',
                'slug' => 'saudi-arabia-work-permit-visa',
                'visa_category' => 'Employment Work Permit (Iqama Visa)',
                'issuing_authority' => 'Ministry of Human Resources and Social Development (Qiwa & Musaned)',
                'processing_time' => '30 - 40 Working Days',
                'contract_period' => '2 Years (Renewable)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
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
                'image' => 'upload/visa_type/visa_2_saudi.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'country_details_id' => '3',
                'name' => 'Dubai (UAE) Work Permit Visa',
                'slug' => 'dubai-uae-work-permit-visa',
                'visa_category' => 'MOHRE Employment Residence Visa',
                'issuing_authority' => 'Ministry of Human Resources and Emiratisation (MOHRE) & GDRFA',
                'processing_time' => '25 - 35 Working Days',
                'contract_period' => '2 Years (Renewable)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
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
                'image' => 'upload/visa_type/visa_3_uae.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'country_details_id' => '4',
                'name' => 'Malaysia Work Permit Visa',
                'slug' => 'malaysia-work-permit-visa',
                'visa_category' => 'Calling Visa / Visa with Reference (VDR)',
                'issuing_authority' => 'Immigration Department of Malaysia & Ministry of Human Resources',
                'processing_time' => '45 - 60 Working Days',
                'contract_period' => '2 Years (Renewable up to 5 Years)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
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
                'image' => 'upload/visa_type/visa_4_malaysia.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'country_details_id' => '5',
                'name' => 'Romania Work Permit Visa',
                'slug' => 'romania-work-permit-visa',
                'visa_category' => 'European Union Work Permit (Aviz de Munca)',
                'issuing_authority' => 'General Inspectorate for Immigration (IGI) & Romanian Ministry of Labor',
                'processing_time' => '60 - 90 Working Days',
                'contract_period' => '1 to 2 Years (Renewable with Pathway to EU Residency)',
                'emigration_clearance' => 'BMET Smart Card Mandatory',
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
