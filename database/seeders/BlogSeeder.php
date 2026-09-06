<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catNews = Category::firstOrCreate(['name' => 'Work Permit & Manpower News']);
        $catSaudi = Category::firstOrCreate(['name' => 'Saudi Arabia Recruitment']);
        $catUae = Category::firstOrCreate(['name' => 'UAE & Gulf Employment']);
        $catMaldives = Category::firstOrCreate(['name' => 'Maldives Island Jobs']);
        $catMalaysia = Category::firstOrCreate(['name' => 'Malaysia Calling Visa']);
        $catRomania = Category::firstOrCreate(['name' => 'Romania & European Visas']);

        $blogs = [
            [
                'category_id' => $catSaudi->id,
                'title' => 'Saudi Arabia Work Permit 2026: Qiwa Verified Contracts & GAMCA Medical Guide',
                'slug' => 'saudi-arabia-work-permit-2026-qiwa-gamca-guide',
                'description' => '<p>Saudi Arabia continues its massive economic diversification under <strong>Vision 2030</strong>, triggering an unprecedented surge in demand for certified overseas workers and technical manpower. With historic megaprojects like <strong>NEOM</strong>, the <strong>Red Sea Project</strong>, <strong>Qiddiya</strong>, and the <strong>Riyadh Metro expansion</strong> rapidly progressing, overseas recruiting agencies are actively mobilizing skilled and semi-skilled candidates across engineering, MEP, masonry, driving, and facility management.</p><h4>1. Electronic Contract Verification via Qiwa</h4><p>Gone are the days of manual paperwork. Today, all overseas work visas must be validated through the Saudi Ministry of Human Resources and Social Development\'s <strong>Qiwa platform</strong>. The employer issues an electronic employment offer that specifies accurate occupational trade designation, basic monthly salary in Saudi Riyals (SAR), overtime calculation, and company-provided accommodation and medical insurance.</p><h4>2. GAMCA / Wafid Medical Fitness Clearance</h4><p>All candidates bound for the Kingdom must clear the mandatory bio-medical screening conducted at accredited <strong>Wafid (formerly GAMCA)</strong> diagnostic centers. The screening checks for infectious diseases, chest X-rays, blood profiles, and general physical fitness. Once marked "FIT", the result is immediately transmitted online to the Saudi Embassy visa portal.</p><h4>3. BMET Clearance & Smart Card Issuance</h4><p>Before departure, each worker receives certified government emigration clearance (BMET Smart Card) ensuring complete legal protection, insurance benefits, and pre-departure orientation training.</p>',
                'image' => 'upload/blog/saudi_manpower_news.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catUae->id,
                'title' => 'UAE Employment Visa 2026: MoHRE Work Permit Quota & Dubai Job Deployment Procedures',
                'slug' => 'uae-employment-visa-2026-mohre-work-permit-procedures',
                'description' => '<p>The United Arab Emirates—particularly Dubai and Abu Dhabi—remains the pinnacle destination for expatriate manpower seeking stability, tax-free earnings, and international career exposure. In 2026, the UAE Ministry of Human Resources and Emiratisation (MoHRE) introduced updated labor quota frameworks designed to streamline the recruitment and welfare of foreign workers.</p><h4>1. MoHRE Job Offer Letter & Electronic Work Permit</h4><p>Before an applicant travels to the UAE, an official MoHRE standardized offer letter is generated in both Arabic and English. This binding agreement must be signed by the candidate. Upon submission, MoHRE approves the corporate quota and issues the electronic <strong>Entry Permit for Employment</strong>.</p><h4>2. In-Demand Manpower Trades in the UAE</h4><p>High-demand trades include Electricians, HVAC mechanics, elevator technicians, plumbers, steel fixers, civil shuttering carpenters, forklift drivers, and facility security specialists.</p><h4>3. Post-Arrival Protocol: Medical, Biometrics & Emirates ID</h4><p>Upon landing at Dubai or Abu Dhabi International Airport, candidates undergo government medical fitness checks followed by biometric enrollment at ICP centers. A 2-year residence visa is affixed and the physical Emirates ID card is delivered.</p><h4>4. Worker Protection & ILOE Insurance</h4><p>Under UAE Labor Law, all employees are enrolled in the Involuntary Loss of Employment (ILOE) scheme and the Wage Protection System (WPS), guaranteeing transparent electronic wage transfers directly into the worker\'s bank account.</p>',
                'image' => 'upload/blog/uae_work_permit.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catMaldives->id,
                'title' => 'Maldives Work Permit & Quota System: High Demand for Resort Operations & Construction Workforce',
                'slug' => 'maldives-work-permit-resort-construction-workforce',
                'description' => '<p>The Republic of Maldives is experiencing a dramatic expansion in its tourism, international aviation, and civil infrastructure sectors. With over 170 operational luxury island resorts and massive infrastructure projects such as the <strong>Velana International Airport expansion</strong> and <strong>Greater Malé Connectivity Bridge</strong>, demand for overseas manpower is at an all-time high.</p><h4>1. The Xpat Online Work Permit System</h4><p>All foreign recruitment in the Maldives is governed directly by the Ministry of Homeland Security and Technology through the centralized <strong>Xpat Online System</strong>. Prospective employers submit job quotas and must receive an official <strong>Employment Approval (EA)</strong> before the worker can legally board a flight to Malé.</p><h4>2. High-Demand Island Professions</h4><p>Key positions include chefs, kitchen stewards, waiters, housekeeping attendants, marine diesel mechanics, RO water plant operators, electricians, speedboat crew, and overwater villa carpenters.</p><h4>3. Working Environment and Expatriate Benefits</h4><p>Resort staff receive fully furnished island accommodations, complimentary daily meals at staff dining facilities, recreation privileges, and round-trip annual flight tickets. Medical screening is conducted within 15 days of arrival to issue the physical Maldives Work Permit Card.</p>',
                'image' => 'upload/blog/maldives_hospitality_jobs.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catMalaysia->id,
                'title' => 'Malaysia Calling Visa (VDR) 2026: Quota Clearances & Bio-Medical Regulations for Factory and Plantation Sectors',
                'slug' => 'malaysia-calling-visa-vdr-2026-quota-bio-medical-regulations',
                'description' => '<p>Malaysia remains a powerhouse for industrial manufacturing, electronics, agriculture, and construction in Southeast Asia. Under the Ministry of Human Resources (KESUMA) and Immigration Department of Malaysia (JIM), overseas recruitment is managed through the government-approved <strong>Visa With Reference (VDR) / Calling Visa</strong> quota system.</p><h4>1. Foreign Workers Centralized Management System (FWCMS)</h4><p>The entire recruitment pipeline is digitized through <strong>FWCMS</strong>. Before a Calling Visa is released, candidates must undergo biometric bio-medical examination at government-authorized medical centers in their home country, ensuring only medically fit candidates proceed to visa endorsement.</p><h4>2. Step-by-Step Calling Visa Procedure</h4><p>The employer receives KDN quota clearance, the Calling Visa approval (VDR) is transmitted to the overseas embassy, and the Single Entry Visa (SEV) is stamped on the candidate\'s passport.</p><h4>3. Post-Arrival FOMEMA & Legal Protections</h4><p>Within 30 days of arrival in Malaysia, candidates take their secondary FOMEMA medical examination to finalize their temporary employment pass (PLKS). Workers enjoy statutory protection under the Malaysian Employment Act, including minimum wage compliance, subsidized hostel housing, and SOCSO insurance.</p>',
                'image' => 'upload/blog/malaysia_calling_visa.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catRomania->id,
                'title' => 'Romania Work Permit (Aviz de Munca) 2026: Legal Pathways for Overseas Technical & General Workers to the EU',
                'slug' => 'romania-work-permit-aviz-de-munca-2026-eu-pathways',
                'description' => '<p>As one of the fastest-growing economies in Eastern Europe—and now an integral member of the <strong>Schengen Zone</strong>—Romania has emerged as the premier European destination for dedicated overseas workforce. With a robust annual foreign worker quota exceeding 100,000 work permits, Romanian enterprises actively recruit international talent to bridge key labor shortages.</p><h4>1. The Official Work Authorization (Aviz de Munca)</h4><p>The Romanian recruitment process begins when the sponsoring employer applies for the <strong>Work Notice (Aviz de Munca)</strong> at the General Inspectorate for Immigration (IGI). The processing includes proving labor shortages and certifying the candidate\'s clean background.</p><h4>2. Long-Stay Employment Visa (Type D/AM)</h4><p>Once the Aviz de Munca is issued in Bucharest, the candidate attends their appointment at the Romanian Embassy or Consulate to receive the <strong>Long-Stay Visa for Employment (Type D/AM)</strong>.</p><h4>3. European Living Standards & Schengen Advantages</h4><p>Upon arrival in Romania, workers obtain the European <strong>Permis de Sedere (Temporary Residence Card)</strong> valid for 1 year, renewable annually. Romanian work permit holders enjoy European standard working conditions, overtime bonuses, and the prospect of applying for permanent European residency after 5 continuous years of legal employment.</p>',
                'image' => 'upload/blog/romania_work_permit.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catNews->id,
                'title' => 'Global Manpower Trends 2026: Why Saudi Arabia, UAE, Maldives, Malaysia, and Romania Lead Overseas Employment',
                'slug' => 'global-manpower-trends-2026-saudi-uae-maldives-malaysia-romania',
                'description' => '<p>The international overseas recruitment industry is witnessing transformative modernization in 2026. Bilateral agreements between labor-sending countries and premier destination nations have established safer, digital, and transparent pathways for overseas job seekers. For candidates seeking financial growth, five powerhouse destinations currently dominate international labor migration: <strong>Saudi Arabia, United Arab Emirates, Maldives, Malaysia, and Romania</strong>.</p><h4>Comparative Snapshot of Top 5 Destination Countries</h4><ul><li><strong>Saudi Arabia:</strong> Unmatched volume of mega-infrastructure jobs, electronic Qiwa contracts, and high long-term savings potential.</li><li><strong>United Arab Emirates:</strong> Cosmopolitan lifestyle, tax-free earnings, rapid 2-year renewable visas, and stringent worker protection under MoHRE.</li><li><strong>Maldives:</strong> World-class luxury resort hospitality careers with all-inclusive island living, ocean recreation, and high tips/service charges.</li><li><strong>Malaysia:</strong> Vast manufacturing and agricultural employment under structured Calling Visa (VDR) quotas and low cost of living.</li><li><strong>Romania:</strong> Direct gateway to European employment, Schengen border benefits, Euro-standard salaries, and long-term residency options.</li></ul><h4>How to Safeguard Yourself Against Recruitment Fraud</h4><p>With high demand comes the danger of unauthorized middlemen. Always verify that your manpower agency holds a valid government recruitment license. At <strong>AL FAHIM INTERNATIONAL</strong>, our candidate tracking system allows all applicants to trace their passport and visa progress in real-time, guaranteeing 100% genuine legal processing from initial medical check to airport flight departure.</p>',
                'image' => 'upload/blog/global_manpower_trends.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(
                ['slug' => $blog['slug']],
                $blog
            );
        }
    }
}
