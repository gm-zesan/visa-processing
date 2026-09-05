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
                'image' => 'upload/visa_type/20240319091455.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'country_details_id' => '2',
                'name' => 'Saudi Arabia Work Permit Visa',
                'slug' => 'saudi-arabia-work-permit-visa',
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
                'image' => 'upload/visa_type/20240319091747.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'country_details_id' => '3',
                'name' => 'Dubai (UAE) Work Permit Visa',
                'slug' => 'dubai-uae-work-permit-visa',
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
                'image' => 'upload/visa_type/20240319091731.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'country_details_id' => '4',
                'name' => 'Malaysia Work Permit Visa',
                'slug' => 'malaysia-work-permit-visa',
                'description' => '<p>The Malaysia Work Permit Visa (Calling Visa / Visa with Reference - VDR) authorizes foreign workers to be legally employed across designated economic sectors in Malaysia. Our agency strictly complies with the bilateral manpower agreements and Malaysian Immigration protocols.</p>
                <h3>Key Features & Facilities:</h3>
                <ul>
                    <li>Approved Malaysian Calling Visa (VDR) issued by Malaysian Immigration.</li>
                    <li>Official contract with structured wages, standard working hours, and medical protection.</li>
                    <li>Hostel accommodation and subsidized/provided facilities by the employer.</li>
                    <li>FOMEMA medical checkup guidance, Malaysian High Commission Single Entry Visa (e-Visa), and BMET clearance.</li>
                </ul>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original passport valid for at least 18 months.</li>
                    <li>Pre-departure medical fitness report from an approved medical clinic.</li>
                    <li>Police clearance certificate and digital photographs.</li>
                    <li>Bio-metric registration and recruitment verification documents.</li>
                </ul>',
                'image' => 'upload/visa_type/20240319100410.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'country_details_id' => '5',
                'name' => 'Romania Work Permit Visa',
                'slug' => 'romania-work-permit-visa',
                'description' => '<p>The Romania Work Permit Visa (Aviz de Munca & Long-Stay D/AM Visa) allows workers to gain official employment within the European Union (EU). We offer end-to-end processing for Romanian employment opportunities with legal residency authorization.</p>
                <h3>Key Features & Facilities:</h3>
                <ul>
                    <li>Official Work Permit (Aviz de Munca) granted by the General Inspectorate for Immigration (IGI) Romania.</li>
                    <li>Legal Romanian employment contract adhering to European labor standards.</li>
                    <li>European residence permit (Permis de Sedere), healthcare, and standard accommodation.</li>
                    <li>Assistance with Embassy of Romania visa application, document apostille, BMET clearance, and flight departure.</li>
                </ul>
                <h3>Required Documents:</h3>
                <ul>
                    <li>Original valid passport with at least 2 years validity.</li>
                    <li>Police Clearance Certificate with Ministry of Foreign Affairs attestation.</li>
                    <li>Medical certificate certifying physical and mental fitness for overseas work.</li>
                    <li>Apostilled / translated personal documentation and photos.</li>
                </ul>',
                'image' => 'upload/visa_type/20240319091455.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        foreach ($visa_types as $visa_type) {
            VisaType::updateOrCreate(['id' => $visa_type['id']], $visa_type);
        }
    }
}
