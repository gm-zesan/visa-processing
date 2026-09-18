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

        $descSaudi = <<<'HTML'
<p class="lead">Under the transformative momentum of <strong>Saudi Vision 2030</strong>, the Kingdom of Saudi Arabia has modernized its labor recruitment ecosystem. Driven by iconic giga-projects like <strong>NEOM</strong>, the <strong>Red Sea Project</strong>, <strong>Qiddiya</strong>, and the <strong>Riyadh Metro expansion</strong>, demand for verified overseas technical talent and skilled labor is reaching historical peaks.</p>

<h2>1. The Qiwa Digital Platform: Electronic Contract Verification</h2>
<p>Gone are the days of manual, ambiguous paperwork. Today, the Saudi Ministry of Human Resources and Social Development (MHRSD) mandates that every single overseas work permit must originate and authenticate through the centralized <strong>Qiwa platform</strong>.</p>

<p>Before a visa block is allocated or embassy processing begins, the sponsoring employer uploads an authenticated electronic employment offer directly to Qiwa. This legally binding digital agreement explicitly declares:</p>
<ul>
    <li><strong>Exact Occupational Trade:</strong> Matching the official Ministry job classification (e.g., Heavy Equipment Mechanic, MEP Electrician, Civil Shuttering Carpenter).</li>
    <li><strong>Basic Monthly Remuneration:</strong> Declared in Saudi Riyals (SAR) with transparent overtime multipliers (minimum 1.5x regular hourly wage).</li>
    <li><strong>Employer-Sponsored Amenities:</strong> Mandatory provision of furnished housing, medical insurance coverage, and pre-scheduled annual paid leave with return flight tickets.</li>
    <li><strong>Probationary Guidelines:</strong> Strictly capped at 90 days under Saudi Labor Law with clear termination and dispute resolution protocols.</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-circle-check"></i></div>
    <div class="callout-content">
        <h5>Key Qiwa Compliance Requirement</h5>
        <p>Candidates must ensure that the electronic contract has been accepted digitally. Never travel on an unauthorized manual contract or an unverified visa—Saudi law strictly penalizes unregistered employment outside the designated Qiwa sponsor.</p>
    </div>
</div>

<h2>2. 2026 In-Demand Technical Trades & Salary Benchmarks</h2>
<p>The following salary matrix represents prevailing industry benchmarks across major construction, engineering, and facility management employers in Riyadh, Jeddah, Dammam, and NEOM:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Occupational Trade</th>
                <th>Basic Monthly Salary (SAR)</th>
                <th>Overtime Potential</th>
                <th>Accommodation & Food</th>
                <th>Contract Period</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Structural Welder (6G / TIG)</strong></td>
                <td>SAR 2,400 – 3,500</td>
                <td>SAR 600 – 1,000/mo</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Heavy Equipment Operator</strong></td>
                <td>SAR 2,200 – 3,200</td>
                <td>SAR 500 – 900/mo</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>MEP Electrician / Plumber</strong></td>
                <td>SAR 1,800 – 2,600</td>
                <td>SAR 400 – 800/mo</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Civil Shuttering Carpenter / Mason</strong></td>
                <td>SAR 1,600 – 2,200</td>
                <td>SAR 400 – 700/mo</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Facility Maintenance General Worker</strong></td>
                <td>SAR 1,400 – 1,800</td>
                <td>SAR 300 – 600/mo</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>3. Wafid (Formerly GAMCA) Bio-Medical Fitness Clearance</h2>
<p>Before any passport can be submitted to the Royal Embassy of Saudi Arabia for visa stamping, candidates must undergo comprehensive bio-medical fitness screening at an accredited <strong>Wafid (GAMCA)</strong> medical center.</p>

<p>The bio-medical protocol is rigorous and includes:</p>
<ul>
    <li><strong>Digital Chest Radiography (X-Ray):</strong> Screening for active or calcified pulmonary tuberculosis (TB).</li>
    <li><strong>Serological & Blood Profile:</strong> Mandatory screening for Hepatitis B surface antigen, Hepatitis C antibodies, HIV 1 & 2, and VDRL.</li>
    <li><strong>Biochemical Tests:</strong> Fasting blood glucose, renal function tests (Serum Creatinine), and hepatic profile (SGPT/SGOT).</li>
    <li><strong>General Physical Fitness:</strong> Comprehensive audiometric, visual acuity, blood pressure, and cardiovascular evaluations.</li>
</ul>

<blockquote>
    <p>"Once a candidate is declared medically FIT at a Wafid center, the diagnostic report is electronically integrated with the Saudi Ministry of Foreign Affairs (MOFA) database within 24 hours, unlocking immediate visa endorsement."</p>
    <cite>— AL FAHIM Consular Affairs Desk</cite>
</blockquote>

<h2>4. Step-by-Step Deployment Roadmap</h2>
<p>From initial skills testing to boarding your flight at Hazrat Shahjalal International Airport, here is the official 5-stage deployment pathway:</p>

<ol>
    <li><strong>Skills Assessment & Trade Test:</strong> Practical demonstration of technical skills at an accredited technical institute.</li>
    <li><strong>Wafid Medical Registration:</strong> Online slip generation, diagnostic testing, and electronic transmission of fitness results.</li>
    <li><strong>Qiwa Contract Acceptance:</strong> Review and digital consent of the employment contract via the Qiwa portal.</li>
    <li><strong>Saudi Embassy Visa Endorsement:</strong> Passport submission through our authorized agency for official visa stamping (MOFA Enjaz).</li>
    <li><strong>BMET Emigration Clearance:</strong> Government fingerprinting, pre-departure orientation briefing, and BMET Smart Card issuance.</li>
</ol>

<div class="blog-callout blog-warning">
    <div class="callout-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
    <div class="callout-content">
        <h5>Crucial Anti-Fraud Advisory</h5>
        <p>Always verify that your recruitment partner holds an authentic Government Recruiting License (RL). At AL FAHIM INTERNATIONAL, each candidate receives an official computerized receipt and can trace their visa file status online 24/7.</p>
    </div>
</div>
HTML;

        $descUae = <<<'HTML'
<p class="lead">The United Arab Emirates—anchored by the dynamic metropolitan hubs of <strong>Dubai, Abu Dhabi, and Sharjah</strong>—continues to set the global benchmark for high-growth expatriate employment. With monumental expansion in green building infrastructure, aviation logistics, international trade, and commercial real estate, overseas recruitment into the UAE has embraced strict transparency under the <strong>Ministry of Human Resources and Emiratisation (MoHRE)</strong>.</p>

<h2>1. MoHRE Electronic Quota & Standardized Job Offer Letter</h2>
<p>Recruitment into the UAE follows a highly structured, digitized methodology designed to eliminate contract substitution and protect employee rights from the very first interaction.</p>

<p>The recruitment process initiates when a licensed UAE enterprise submits an electronic quota application. Once approved by MoHRE, the ministry generates a <strong>Standardized Job Offer Letter</strong> formatted in both English and the candidate's native language. Key legal safeguards include:</p>
<ul>
    <li><strong>Binding Compensation Breakdown:</strong> Clear segregation of basic wage, housing allowance, transportation allowance, and monthly utilities.</li>
    <li><strong>Working Hours & Rest Days:</strong> Standard 8-hour workday, 48 hours maximum per week, with one mandatory paid rest day.</li>
    <li><strong>Health Insurance Classification:</strong> Mandatory employer-funded medical insurance policy active from day one of deployment.</li>
    <li><strong>Probation Rules:</strong> Maximum 6-month statutory probation period with mutual 14-day written notice requirements.</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-file-contract"></i></div>
    <div class="callout-content">
        <h5>Bilingual Contract Protection</h5>
        <p>Under UAE Federal Decree-Law No. 33 of 2021, the terms stated in your signed MoHRE offer letter cannot be altered to less favorable terms upon arrival in Dubai or Abu Dhabi. Your signed offer letter is legally enforceable in UAE labor courts.</p>
    </div>
</div>

<h2>2. In-Demand UAE Trades & Compensation Matrix (2026)</h2>
<p>Below are current market salary rates for verified corporate quotas deployed by AL FAHIM INTERNATIONAL across Dubai and Abu Dhabi:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Trade Designation</th>
                <th>Basic Monthly Salary (AED)</th>
                <th>Overtime Rates</th>
                <th>Accommodation & Transport</th>
                <th>Visa Validity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Commercial HVAC Technician</strong></td>
                <td>AED 2,200 – 3,400</td>
                <td>1.25x – 1.5x Hourly</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Building Electrician / Plumber</strong></td>
                <td>AED 1,800 – 2,600</td>
                <td>1.25x – 1.5x Hourly</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Security Guard (SIRA / PSBD Certified)</strong></td>
                <td>AED 2,000 – 2,800</td>
                <td>Fixed Overtime Tier</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Structural Steel Fabricator / Fitter</strong></td>
                <td>AED 1,900 – 2,700</td>
                <td>1.25x – 1.5x Hourly</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Warehouse Logistics & Forklift Operator</strong></td>
                <td>AED 2,000 – 3,000</td>
                <td>1.25x – 1.5x Hourly</td>
                <td>Company Provided</td>
                <td>2 Years (Renewable)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>3. The 4-Stage Deployment Pipeline</h2>
<p>The processing cycle for an authenticated UAE Employment Visa typically spans <strong>18 to 28 working days</strong> through the following streamlined stages:</p>

<ol>
    <li><strong>MoHRE Offer Letter & Electronic Work Permit:</strong> Quota verification, electronic signing, and issuance of the 60-day Entry Permit for Employment.</li>
    <li><strong>BMET Emigration Clearance:</strong> Attestation of employment visa, biometric fingerprinting, pre-departure safety briefing, and issuance of the BMET Smart Card.</li>
    <li><strong>Airport Transit & Arrival Welcome:</strong> Dedicated meet-and-assist transfer from Dubai (DXB) or Abu Dhabi (AUH) airport to company accommodations.</li>
    <li><strong>Preventive Medicine Screening & Emirates ID:</strong> In-country medical fitness screening (chest X-ray, blood screening), biometric enrollment at ICP centers, and issuance of the physical 2-year Emirates ID.</li>
</ol>

<blockquote>
    <p>"With the implementation of the Involuntary Loss of Employment (ILOE) insurance scheme and the electronic Wage Protection System (WPS), the UAE provides one of the safest social security frameworks for foreign workers worldwide."</p>
    <cite>— UAE Labor Law Regulatory Overview</cite>
</blockquote>

<h2>4. Mandatory Worker Welfare Guarantees</h2>
<p>Every worker deployed under our official visa allocations benefits from:</p>
<ul>
    <li><strong>Wage Protection System (WPS):</strong> Salaries are disbursed electronically into personal bank accounts or C3 payroll cards by the 5th of every month.</li>
    <li><strong>Involuntary Loss of Employment (ILOE):</strong> Financial safety net providing up to 60% of basic salary in the event of involuntary job loss.</li>
    <li><strong>Annual Paid Vacation:</strong> 30 calendar days of annual paid leave with company-provided return air tickets upon completion of each 2-year tenure.</li>
</ul>
HTML;

        $descMaldives = <<<'HTML'
<p class="lead">The Republic of Maldives is currently experiencing an unprecedented economic renaissance. Renowned across the world for over 170 ultra-luxury island resorts, the archipelago is also investing billions of dollars into transformative civil infrastructure—including the <strong>Velana International Airport expansion</strong>, the <strong>Greater Malé Connectivity Bridge</strong>, and luxury eco-atoll developments.</p>

<h2>1. The Xpat Online System & Employment Approval (EA)</h2>
<p>Foreign recruitment in the Maldives is strictly regulated by the <strong>Ministry of Homeland Security and Technology</strong> through the centralized <strong>Xpat Online Portal</strong>. This modern digital architecture ensures that only accredited corporate employers with verified foreign worker quotas can hire international manpower.</p>

<p>The prerequisite for any foreign worker travelling to the Maldives is the <strong>Employment Approval (EA)</strong>. This official government document is generated electronically and validates:</p>
<ul>
    <li><strong>Approved Employer Quota:</strong> Verifying that the island resort or construction conglomerate possesses authorized foreign worker vacancies.</li>
    <li><strong>Designated Island Location:</strong> Confirming the specific resort island, atoll, or construction site of assignment.</li>
    <li><strong>Salary In US Dollars (USD):</strong> Direct monthly earnings benchmarked in USD, with minimum basic wage compliance.</li>
    <li><strong>All-Inclusive Island Provisions:</strong> Mandatory provision of air-conditioned staff quarters, daily gourmet dining, laundry services, and healthcare facilities.</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-umbrella-beach"></i></div>
    <div class="callout-content">
        <h5>The All-Inclusive Resort Advantage</h5>
        <p>In resort island employment, staff accommodation, all 3 daily meals, gym access, medical clinics, and recreational amenities are 100% complimentary. Expatriate workers can save nearly 85% to 90% of their net salary every month.</p>
    </div>
</div>

<h2>2. Maldives Resort & Engineering Compensation Matrix</h2>
<p>Prevailing compensation packages across 5-star island resorts and major civil contractors in the Maldives:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Job Category</th>
                <th>Basic Monthly Salary (USD)</th>
                <th>Monthly Service Charge / Tips</th>
                <th>Boarding & Lodging</th>
                <th>Flight Entitlement</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Resort Commis Chef / Baker</strong></td>
                <td>USD $450 – $750</td>
                <td>USD $300 – $600/mo</td>
                <td>Free Luxury Staff Village</td>
                <td>Annual Round-Trip Flight</td>
            </tr>
            <tr>
                <td><strong>F&B Waiter / Bartender</strong></td>
                <td>USD $400 – $650</td>
                <td>USD $350 – $700/mo</td>
                <td>Free Luxury Staff Village</td>
                <td>Annual Round-Trip Flight</td>
            </tr>
            <tr>
                <td><strong>Villa Housekeeping Attendant</strong></td>
                <td>USD $350 – $550</td>
                <td>USD $300 – $550/mo</td>
                <td>Free Luxury Staff Village</td>
                <td>Annual Round-Trip Flight</td>
            </tr>
            <tr>
                <td><strong>Marine Diesel Mechanic</strong></td>
                <td>USD $500 – $800</td>
                <td>USD $200 – $400/mo</td>
                <td>Free Accommodation & Meals</td>
                <td>Annual Round-Trip Flight</td>
            </tr>
            <tr>
                <td><strong>RO Desalination Plant Operator</strong></td>
                <td>USD $450 – $700</td>
                <td>USD $150 – $300/mo</td>
                <td>Free Accommodation & Meals</td>
                <td>Annual Round-Trip Flight</td>
            </tr>
            <tr>
                <td><strong>Civil Construction Mason / Carpenter</strong></td>
                <td>USD $350 – $500</td>
                <td>Overtime Allowances</td>
                <td>Free Accommodation & Meals</td>
                <td>Bi-Annual Round-Trip Flight</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>3. Post-Arrival Protocol at Malé International Airport</h2>
<p>Upon landing at Velana International Airport in Malé, candidates follow a streamlined legal arrival protocol:</p>

<ol>
    <li><strong>Immigration Clearance with Employment Approval:</strong> Presentation of the official printed EA copy and passport at the specialized Expatriate Immigration counter for a 15-day transit entry stamp.</li>
    <li><strong>Employer Representative Transfer:</strong> Immediate speedboat or domestic seaplane transfer directly to the assigned resort atoll or project base.</li>
    <li><strong>In-Country Bio-Medical Screening:</strong> Completion of mandatory medical fitness tests (chest X-ray, blood tests) at an accredited Maldivian clinic within 15 days.</li>
    <li><strong>Physical Maldives Work Permit Card:</strong> Biometric card issuance granting official legal residence and employment authorization.</li>
</ol>

<blockquote>
    <p>"The unique aspect of working in the Maldives resort industry is the monthly service charge. During peak tourism seasons (November to April), service charge bonuses can frequently match or exceed the basic monthly salary."</p>
    <cite>— AL FAHIM Island Recruitment Specialist</cite>
</blockquote>

<h2>4. Candidate Checklist Before Flight Departure</h2>
<ul>
    <li>Original international passport valid for at least 12 months.</li>
    <li>Official colored copy of the Xpat Employment Approval (EA).</li>
    <li>Certified BMET Emigration Smart Card from the Ministry of Expatriates' Welfare.</li>
    <li>Pre-departure bio-medical fitness certificate.</li>
    <li>Attested trade certificates (for hospitality, culinary, and marine engineering trades).</li>
</ul>
HTML;

        $descMalaysia = <<<'HTML'
<p class="lead">As one of Southeast Asia's foremost manufacturing, electronics, and agro-industrial powerhouses, Malaysia continues to offer high-volume, reliable employment for overseas workers. Governed jointly by the <strong>Ministry of Human Resources (KESUMA)</strong> and the <strong>Immigration Department of Malaysia (JIM)</strong>, legal recruitment is operated through the government-approved <strong>Visa With Reference (VDR)</strong> system, universally known as the <strong>Calling Visa</strong>.</p>

<h2>1. The FWCMS Centralized Digital Pipeline</h2>
<p>The entire recruitment process into Malaysia is fully digitized via the <strong>Foreign Workers Centralized Management System (FWCMS)</strong>. This state-of-the-art framework prevents document forgery and enforces complete accountability across both employers and recruitment agencies.</p>

<p>The FWCMS pipeline guarantees that:</p>
<ul>
    <li><strong>KDN Quota Approval:</strong> The hiring employer possesses verified hiring approval issued by the Ministry of Home Affairs (KDN).</li>
    <li><strong>Pre-Departure Biometric Health Clearance:</strong> Candidate medical data is captured biometrically at accredited medical centers and transmitted directly to Malaysian immigration.</li>
    <li><strong>Statutory Minimum Wage Compliance:</strong> Contracts strictly observe Malaysia's statutory minimum wage (RM 1,500 – RM 1,800) with formalized overtime pay calculations.</li>
    <li><strong>Mandatory SOCSO Protection:</strong> Full enrollment in the Social Security Organisation (SOCSO) scheme covering workplace injury, disability, and invalidity benefits.</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-shield-halved"></i></div>
    <div class="callout-content">
        <h5>Official Calling Visa (VDR) Verification</h5>
        <p>A genuine Calling Visa includes a unique government QR code and approval reference number verifiable on the official Immigration Department of Malaysia portal. Never trust agents claiming to offer tourist or transit visa conversions—such practices are illegal under Malaysian law.</p>
    </div>
</div>

<h2>2. 2026 Malaysian Industry Salary & Overtime Guidelines</h2>
<p>Standardized wage structures and statutory benefits for verified Malaysian corporate employers:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Industry Sector</th>
                <th>Basic Monthly Wage (MYR)</th>
                <th>Overtime Multipliers</th>
                <th>Hostel & Medical Care</th>
                <th>Pass Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Semiconductor & Electronics Assembly</strong></td>
                <td>RM 1,500 – 1,900</td>
                <td>1.5x Normal / 2.0x Rest Days</td>
                <td>Centralized Hostel Provided</td>
                <td>PLKS (Annual Renewable)</td>
            </tr>
            <tr>
                <td><strong>Automotive & Metal Fabrication</strong></td>
                <td>RM 1,600 – 2,100</td>
                <td>1.5x Normal / 2.0x Rest Days</td>
                <td>Centralized Hostel Provided</td>
                <td>PLKS (Annual Renewable)</td>
            </tr>
            <tr>
                <td><strong>Plastic & Rubber Molding Factory</strong></td>
                <td>RM 1,500 – 1,850</td>
                <td>1.5x Normal / 2.0x Rest Days</td>
                <td>Centralized Hostel Provided</td>
                <td>PLKS (Annual Renewable)</td>
            </tr>
            <tr>
                <td><strong>Civil Construction & Infrastructure</strong></td>
                <td>RM 1,600 – 2,200</td>
                <td>1.5x Normal / 2.0x Rest Days</td>
                <td>On-Site Quarters Provided</td>
                <td>PLKS (Annual Renewable)</td>
            </tr>
            <tr>
                <td><strong>Plantation & Agro-Processing</strong></td>
                <td>RM 1,500 – 1,800</td>
                <td>Incentive Piece-Rate Options</td>
                <td>Estate Housing Provided</td>
                <td>PLKS (Annual Renewable)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>3. Step-by-Step Calling Visa (VDR) Process</h2>
<p>From interview selection to airport landing at Kuala Lumpur International Airport (KLIA):</p>

<ol>
    <li><strong>Employer Interview & Selection:</strong> Direct or video-conference trade selection by the Malaysian hiring company.</li>
    <li><strong>Biometric Medical Screening:</strong> Undergoing certified medical examination at an authorized FWCMS-linked clinic.</li>
    <li><strong>VDR (Calling Visa) Issuance:</strong> Immigration Department of Malaysia issues the official electronic Visa With Reference approval.</li>
    <li><strong>Single Entry Visa (SEV) Stamping:</strong> Passport submission to the Malaysian High Commission for single-entry visa endorsement.</li>
    <li><strong>BMET Emigration Clearance:</strong> Final government clearance, briefing, and issuance of the BMET Smart Card.</li>
    <li><strong>Post-Arrival FOMEMA Medical Check:</strong> Secondary mandatory bio-medical screening conducted in Malaysia within 30 days of arrival to receive the official annual Temporary Employment Visit Pass (PLKS) sticker.</li>
</ol>

<blockquote>
    <p>"Under the Malaysian Employment Act, employers must provide clean, certified accommodations complying with the Workers' Minimum Standards of Housing and Amenities Act (Act 446)."</p>
    <cite>— Malaysian Ministry of Human Resources (KESUMA)</cite>
</blockquote>

<h2>4. Essential Document Checklist for Candidates</h2>
<ul>
    <li>Passport with a minimum of 18 months remaining validity.</li>
    <li>Attested educational or technical certificate (where applicable).</li>
    <li>FWCMS bio-medical fitness clearance report.</li>
    <li>Four passport-sized photographs against a pure white background.</li>
    <li>Police Clearance Certificate (PCC) attested by the Ministry of Foreign Affairs.</li>
</ul>
HTML;

        $descRomania = <<<'HTML'
<p class="lead">As one of the fastest-growing industrial economies in Eastern Europe—and now an integral member of the <strong>European Schengen Zone</strong>—Romania represents the premier legal gateway for overseas skilled and general workers seeking dignified, Euro-standard careers within the European Union. With an annual government-approved foreign worker quota exceeding <strong>100,000 work permits</strong>, Romanian enterprises actively recruit dedicated international talent.</p>

<h2>1. The Official Work Authorization: Aviz de Munca</h2>
<p>The Romanian foreign employment pipeline begins in Bucharest through the <strong>General Inspectorate for Immigration (IGI - Inspectoratul General pentru Imigrări)</strong>. Before any visa can be requested at a Romanian embassy, the sponsoring employer must obtain an official <strong>Work Notice (Aviz de Munca)</strong>.</p>

<p>To secure the Aviz de Munca, the Romanian employer must prove:</p>
<ul>
    <li><strong>Labor Market Justification:</strong> Demonstrating through the National Employment Agency (ANOFM) that the vacancy cannot be filled by Romanian or EU citizens.</li>
    <li><strong>Clean Corporate Record:</strong> Verifying that the hiring company is in full compliance with fiscal regulations and has no record of labor violations.</li>
    <li><strong>Candidate Qualification Verification:</strong> Validation of the worker's professional experience, clean criminal background, and educational aptitude.</li>
    <li><strong>Legally Mandated Salary:</strong> Contractual commitment to pay at or above the national gross minimum wage established by the Romanian Government.</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-passport"></i></div>
    <div class="callout-content">
        <h5>Schengen Zone Advantages</h5>
        <p>With Romania's integration into Schengen, foreign workers holding a Romanian Residence Permit (Permis de Sedere) enjoy simplified cross-border travel privileges across 29 European countries for leisure during their paid vacations.</p>
    </div>
</div>

<h2>2. Romanian Employment Compensation & Benefits (2026)</h2>
<p>Below are authentic net earning ranges across leading Romanian civil infrastructure, logistics, and manufacturing conglomerates:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Occupational Trade</th>
                <th>Net Monthly Salary (€ Euro)</th>
                <th>Overtime Potential (€)</th>
                <th>Accommodation & Meals</th>
                <th>Residence Permit Validity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Industrial Welder (MIG/MAG / TIG)</strong></td>
                <td>€850 – €1,250</td>
                <td>€200 – €400/mo</td>
                <td>Employer Furnished Apartment</td>
                <td>1 Year (Renewable)</td>
            </tr>
            <tr>
                <td><strong>CNC Machine Operator / Machinist</strong></td>
                <td>€800 – €1,150</td>
                <td>€150 – €350/mo</td>
                <td>Employer Furnished Apartment</td>
                <td>1 Year (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Civil Construction Mason / Carpenter</strong></td>
                <td>€750 – €1,000</td>
                <td>€150 – €300/mo</td>
                <td>Employer Furnished Apartment</td>
                <td>1 Year (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Warehouse Order Picker & Logistics</strong></td>
                <td>€700 – €950</td>
                <td>€100 – €250/mo</td>
                <td>Employer Furnished Apartment</td>
                <td>1 Year (Renewable)</td>
            </tr>
            <tr>
                <td><strong>Food Processing & Packaging Operative</strong></td>
                <td>€650 – €850</td>
                <td>€100 – €200/mo</td>
                <td>Employer Furnished Apartment</td>
                <td>1 Year (Renewable)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>3. Step-by-Step Pathway to European Employment</h2>
<p>From initial document compilation to settling in Bucharest, Cluj-Napoca, or Timișoara:</p>

<ol>
    <li><strong>Document Submission & IGI Petition:</strong> Passport scan, apostilled Police Clearance Certificate (PCC), and curriculum vitae submitted to the Romanian employer.</li>
    <li><strong>Aviz de Munca Approval:</strong> The General Inspectorate for Immigration issues the official electronic Work Authorization (processing takes approximately 6 to 10 weeks).</li>
    <li><strong>Consular Long-Stay Visa (Type D/AM):</strong> Interview and biometric visa stamping at the Romanian Embassy or Consulate.</li>
    <li><strong>BMET Emigration Clearance:</strong> Completion of government emigration processing, mandatory briefing, and BMET Smart Card issuance.</li>
    <li><strong>Permis de Sedere (Temporary Residence Card):</strong> Upon arrival in Romania, the employer registers the worker with local immigration authorities to issue the 1-year biometric European Residence Card (Permis de Sedere).</li>
</ol>

<blockquote>
    <p>"After 5 years of continuous legal residence and tax contributions in Romania, foreign workers become legally eligible to apply for Long-Term EU Residency, securing a permanent European future for themselves and their families."</p>
    <cite>— European Migration Law Framework</cite>
</blockquote>

<h2>4. Standard European Worker Protections</h2>
<ul>
    <li><strong>National Health Insurance (CNAS):</strong> Full medical coverage at public hospitals and emergency health services.</li>
    <li><strong>Paid Annual Leave:</strong> Minimum 20 working days of paid holiday per year under the Romanian Labor Code.</li>
    <li><strong>Accommodation Standards:</strong> Clean, heated, and furnished apartment accommodations with kitchen and laundry facilities.</li>
</ul>
HTML;

        $descGlobal = <<<'HTML'
<p class="lead">The international labor migration landscape is experiencing its most transformative evolution in over three decades. Bilateral government accords, digitized verification portals, mandatory wage protection systems, and universal biometric screenings have dramatically reshaped how overseas workers are recruited and deployed. For candidates seeking financial stability, five powerhouse nations stand at the pinnacle of global manpower recruitment: <strong>Saudi Arabia, United Arab Emirates, Maldives, Malaysia, and Romania</strong>.</p>

<h2>1. Cross-Country Comparative Analysis: Top 5 Destinations</h2>
<p>To help candidates and their families make informed, life-changing decisions, the following comprehensive comparison summarizes the operational frameworks of the world's leading destination countries:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Destination Country</th>
                <th>Primary Growth Sectors</th>
                <th>Monthly Net Savings Potential</th>
                <th>Processing Timeline</th>
                <th>Key Legal Advantage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Saudi Arabia</strong></td>
                <td>NEOM Megaprojects, Civil Infrastructure, MEP, Facility Care</td>
                <td>SAR 1,800 – 3,500/mo ($480 – $930)</td>
                <td>30 – 45 Days</td>
                <td>Qiwa Electronic Contract, Zero Income Tax, High Savings</td>
            </tr>
            <tr>
                <td><strong>United Arab Emirates</strong></td>
                <td>Commercial Construction, Hospitality, Logistics, Security</td>
                <td>AED 2,000 – 4,000/mo ($540 – $1,080)</td>
                <td>20 – 30 Days</td>
                <td>MoHRE Wage Protection (WPS), ILOE Insurance, Modern Living</td>
            </tr>
            <tr>
                <td><strong>Maldives</strong></td>
                <td>Luxury Island Resorts, Marine Engineering, Airport Expansion</td>
                <td>USD $400 – $1,200/mo ($400 – $1,200)</td>
                <td>25 – 35 Days</td>
                <td>100% Free Food & Lodging, Monthly USD Service Charge</td>
            </tr>
            <tr>
                <td><strong>Malaysia</strong></td>
                <td>Electronics Assembly, Precision Manufacturing, Construction</td>
                <td>MYR 1,800 – 3,000/mo ($380 – $640)</td>
                <td>40 – 60 Days</td>
                <td>FWCMS Calling Visa (VDR), Low Living Cost, SOCSO Safety Net</td>
            </tr>
            <tr>
                <td><strong>Romania</strong></td>
                <td>Industrial Welding, CNC Machining, Warehousing, Civil Works</td>
                <td>€750 – €1,400/mo ($820 – $1,520)</td>
                <td>60 – 90 Days</td>
                <td>Schengen Member, Euro Currency, Pathway to Permanent EU Residency</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>2. How to Choose the Optimal Country for Your Profile</h2>
<p>Each destination aligns with specific career goals, skills levels, and family financial plans:</p>

<ul>
    <li><strong>For Maximum Financial Savings:</strong> Saudi Arabia and UAE offer the highest volume of technical and infrastructure opportunities with zero personal income taxation and comprehensive employer-paid boarding.</li>
    <li><strong>For Hospitality & Service Careers:</strong> The Maldives offers an unmatched tropical luxury work environment, prestigious international hotel brand certifications, and lucrative US Dollar service charge bonuses.</li>
    <li><strong>For Factory & Manufacturing Consistency:</strong> Malaysia provides predictable, structured assembly-line careers with clean hostel housing, strict overtime regulations, and friendly cultural familiarity.</li>
    <li><strong>For Long-Term European Settlement:</strong> Romania delivers direct integration into the European Union and Schengen Zone, opening avenues for long-term residency and European family reunification.</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-award"></i></div>
    <div class="callout-content">
        <h5>AL FAHIM Real-Time Candidate Tracking</h5>
        <p>Every applicant registered with AL FAHIM INTERNATIONAL is assigned a unique digital tracking code. You can monitor your medical status, embassy visa submission, BMET emigration clearance, and flight ticketing directly through our online portal.</p>
    </div>
</div>

<h2>3. The 5 Golden Rules for Safe Overseas Migration</h2>
<p>To protect your hard-earned finances and ensure complete legal security, always adhere to these five non-negotiable standards:</p>

<ol>
    <li><strong>Verify Government Recruitment Licensing:</strong> Never deal with unregistered intermediaries. Always confirm that the recruiting agency holds an active license (RL) recognized by the Ministry of Expatriates' Welfare.</li>
    <li><strong>Insist on Official Bank Receipts:</strong> Never pay cash without an authenticated computerized receipt clearly displaying the company's official seal.</li>
    <li><strong>Demand Electronic Contract Verification:</strong> Ensure your employment contract is visible on the destination country's government portal (Qiwa for Saudi, MoHRE for UAE, Xpat for Maldives, FWCMS for Malaysia, IGI for Romania).</li>
    <li><strong>Complete Mandatory Bio-Medical Screenings:</strong> Always undergo diagnostic testing exclusively at government-accredited centers (Wafid / GAMCA, FWCMS, etc.).</li>
    <li><strong>Carry Your BMET Smart Card:</strong> Never attempt to board an international flight without valid government emigration clearance (BMET Smart Card) guaranteeing statutory insurance coverage.</li>
</ol>

<blockquote>
    <p>"Overseas employment is not merely a job; it is a transformative stepping stone for the economic empowerment of workers and their families. Transparent, ethical recruitment is the only standard that guarantees lasting prosperity."</p>
    <cite>— AL FAHIM INTERNATIONAL Managing Directorate</cite>
</blockquote>
HTML;

        $descSaudiBn = <<<'HTML'
<p class="lead"><strong>সৌদি ভিশন ২০৩০</strong>-এর রূপান্তরমূলক গতির অধীনে, সৌদি আরব তার শ্রম নিয়োগ ইকোসিস্টেমকে আধুনিকীকরণ করেছে। <strong>নিয়োম (NEOM)</strong>, <strong>লোহিত সাগর প্রকল্প (Red Sea Project)</strong>, <strong>কিবিয়া (Qiddiya)</strong> এবং <strong>রিয়াদ মেট্রো সম্প্রসারণ</strong> এর মতো মেগা-প্রজেক্ট দ্বারা চালিত হয়ে, যাচাইকৃত বিদেশী কারিগরি এবং দক্ষ শ্রমিকের চাহিদা ঐতিহাসিক শীর্ষে পৌঁছেছে।</p>

<h2>১. কিওয়া (Qiwa) ডিজিটাল প্ল্যাটফর্ম: ইলেকট্রনিক চুক্তি যাচাইকরণ</h2>
<p>ম্যানুয়াল এবং অস্পষ্ট কাগজপত্রের দিন শেষ। বর্তমানে, সৌদি মানবসম্পদ ও সামাজিক উন্নয়ন মন্ত্রণালয় (MHRSD) নির্দেশ দিয়েছে যে প্রতিটি বিদেশী ওয়ার্ক পারমিট অবশ্যই কেন্দ্রীভূত <strong>কিওয়া (Qiwa) প্ল্যাটফর্মের</strong> মাধ্যমে তৈরি এবং যাচাই করতে হবে।</p>

<p>ভিসা ব্লক বরাদ্দ বা দূতাবাস প্রক্রিয়াকরণ শুরু হওয়ার আগে, স্পনসরকারী নিয়োগকর্তা সরাসরি কিওয়াতে একটি প্রমাণীকৃত ইলেকট্রনিক কর্মসংস্থান অফার আপলোড করেন। এই আইনত বাধ্যতামূলক ডিজিটাল চুক্তি স্পষ্টভাবে ঘোষণা করে:</p>
<ul>
    <li><strong>সঠিক পেশা:</strong> মন্ত্রণালয়ের কাজের শ্রেণীবিভাগের সাথে মিল থাকা (যেমন, হেভি ইকুইপমেন্ট মেকানিক, এমইপি ইলেকট্রিশিয়ান, সিভিল শাটারিং কার্পেন্টার)।</li>
    <li><strong>মূল মাসিক বেতন:</strong> সৌদি রিয়ালে (SAR) ঘোষিত এবং স্বচ্ছ ওভারটাইম মাল্টিপ্লায়ার সহ (নিয়মিত ঘণ্টার বেতনের কমপক্ষে ১.৫ গুণ)।</li>
    <li><strong>নিয়োগকর্তা-স্পনসরকৃত সুবিধাসমূহ:</strong> সুসজ্জিত আবাসন, চিকিৎসা বীমা কভারেজ এবং রিটার্ন ফ্লাইট টিকিট সহ প্রাক-নির্ধারিত বার্ষিক বেতনের ছুটি।</li>
    <li><strong>প্রবেশন গাইডলাইন:</strong> সৌদি শ্রম আইনের অধীনে কঠোরভাবে ৯০ দিনের মধ্যে সীমাবদ্ধ এবং স্পষ্ট অবসান ও বিরোধ নিষ্পত্তির প্রোটোকল।</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-circle-check"></i></div>
    <div class="callout-content">
        <h5>মূল কিওয়া কমপ্লায়েন্স প্রয়োজনীয়তা</h5>
        <p>প্রার্থীদের অবশ্যই নিশ্চিত করতে হবে যে ইলেকট্রনিক চুক্তিটি ডিজিটালভাবে গ্রহণ করা হয়েছে। অননুমোদিত ম্যানুয়াল চুক্তিতে বা যাচাই না করা ভিসায় কখনও ভ্রমণ করবেন না—সৌদি আইন নির্দিষ্ট কিওয়া স্পনসরের বাইরে অনিবন্ধিত কর্মসংস্থানের জন্য কঠোর শাস্তি দেয়।</p>
    </div>
</div>

<h2>২. ২০২৬ সালের চাহিদাসম্পন্ন কারিগরি ট্রেড এবং বেতন মানদণ্ড</h2>
<p>নিম্নলিখিত বেতন ম্যাট্রিক্স রিয়াদ, জেদ্দা, দাম্মাম এবং নিয়োমে প্রধান নির্মাণ, প্রকৌশল এবং সুবিধা ব্যবস্থাপনা নিয়োগকর্তাদের মধ্যে প্রচলিত শিল্পের মানদণ্ডকে প্রতিনিধিত্ব করে:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>পেশাগত ট্রেড</th>
                <th>মূল মাসিক বেতন (SAR)</th>
                <th>ওভারটাইম সম্ভাবনা</th>
                <th>আবাসন ও খাবার</th>
                <th>চুক্তির মেয়াদ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>স্ট্রাকচারাল ওয়েল্ডার (6G / TIG)</strong></td>
                <td>SAR ২,৪০০ – ৩,৫০০</td>
                <td>SAR ৬০০ – ১,০০০/মাস</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>হেভি ইকুইপমেন্ট অপারেটর</strong></td>
                <td>SAR ২,২০০ – ৩,২০০</td>
                <td>SAR ৫০০ – ৯০০/মাস</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>এমইপি ইলেকট্রিশিয়ান / প্লাম্বার</strong></td>
                <td>SAR ১,৮০০ – ২,৬০০</td>
                <td>SAR ৪০০ – ৮০০/মাস</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>সিভিল শাটারিং কার্পেন্টার / রাজমিস্ত্রি</strong></td>
                <td>SAR ১,৬০০ – ২,২০০</td>
                <td>SAR ৪০০ – ৭০০/মাস</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>ফ্যাসিলিটি মেইনটেন্যান্স জেনারেল ওয়ার্কার</strong></td>
                <td>SAR ১,৪০০ – ১,৮০০</td>
                <td>SAR ৩০০ – ৬০০/মাস</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>৩. ওয়াফিদ (আগে গামকা) বায়ো-মেডিকেল ফিটনেস ক্লিয়ারেন্স</h2>
<p>ভিসা স্ট্যাম্পিংয়ের জন্য রয়্যাল সৌদি দূতাবাসে পাসপোর্ট জমা দেওয়ার আগে, প্রার্থীদের একটি অনুমোদিত <strong>ওয়াফিদ (গামকা)</strong> মেডিকেল সেন্টারে ব্যাপক বায়ো-মেডিকেল ফিটনেস স্ক্রীনিং করতে হবে।</p>

<p>বায়ো-মেডিকেল প্রোটোকল কঠোর এবং এতে অন্তর্ভুক্ত রয়েছে:</p>
<ul>
    <li><strong>ডিজিটাল চেস্ট রেডিওগ্রাফি (X-Ray):</strong> সক্রিয় বা ক্যালসিফাইড পালমোনারি যক্ষ্মা (TB) পরীক্ষা।</li>
    <li><strong>সেরোলজিক্যাল এবং রক্তের প্রোফাইল:</strong> হেপাটাইটিস বি সারফেস অ্যান্টিজেন, হেপাটাইটিস সি অ্যান্টিবডি, এইচআইভি ১ ও ২ এবং ভিডিআরএল এর জন্য বাধ্যতামূলক পরীক্ষা।</li>
    <li><strong>বায়োকেমিক্যাল টেস্ট:</strong> ফাস্টিং ব্লাড গ্লুকোজ, রেনাল ফাংশন টেস্ট (সিরাম ক্রিয়েটিনিন) এবং হেপাটিক প্রোফাইল (SGPT/SGOT)।</li>
    <li><strong>সাধারণ শারীরিক ফিটনেস:</strong> অডিওমেট্রিক, চাক্ষুষ তীক্ষ্ণতা, রক্তচাপ এবং কার্ডিওভাসকুলার মূল্যায়ন।</li>
</ul>

<blockquote>
    <p>"একবার একজন প্রার্থীকে একটি ওয়াফিদ কেন্দ্রে চিকিৎসাগতভাবে ফিট ঘোষণা করা হলে, ডায়াগনস্টিক রিপোর্ট ২৪ ঘন্টার মধ্যে সৌদি পররাষ্ট্র মন্ত্রণালয় (MOFA) ডাটাবেসের সাথে ইলেকট্রনিকভাবে একত্রিত করা হয়, যা অবিলম্বে ভিসা অনুমোদনের সুযোগ দেয়।"</p>
    <cite>— আল ফাহিম কনস্যুলার অ্যাফেয়ার্স ডেস্ক</cite>
</blockquote>

<h2>৪. ধাপে ধাপে ডিপ্লয়মেন্ট রোডম্যাপ</h2>
<p>প্রাথমিক দক্ষতা পরীক্ষা থেকে হযরত শাহজালাল আন্তর্জাতিক বিমানবন্দরে ফ্লাইটে ওঠা পর্যন্ত, এখানে ৫-পর্যায়ের ডিপ্লয়মেন্ট পথ রয়েছে:</p>

<ol>
    <li><strong>দক্ষতা মূল্যায়ন ও ট্রেড টেস্ট:</strong> একটি অনুমোদিত কারিগরি প্রতিষ্ঠানে প্রযুক্তিগত দক্ষতার ব্যবহারিক প্রদর্শন।</li>
    <li><strong>ওয়াফিদ মেডিকেল নিবন্ধন:</strong> অনলাইন স্লিপ তৈরি, ডায়াগনস্টিক পরীক্ষা এবং ফিটনেস ফলাফলের ইলেকট্রনিক ট্রান্সমিশন।</li>
    <li><strong>কিওয়া চুক্তি গ্রহণ:</strong> কিওয়া পোর্টালের মাধ্যমে কর্মসংস্থান চুক্তির পর্যালোচনা এবং ডিজিটাল সম্মতি।</li>
    <li><strong>সৌদি দূতাবাস ভিসা এনডোর্সমেন্ট:</strong> অফিসিয়াল ভিসা স্ট্যাম্পিংয়ের (MOFA Enjaz) জন্য আমাদের অনুমোদিত এজেন্সির মাধ্যমে পাসপোর্ট জমা দেওয়া।</li>
    <li><strong>বিএমইটি ইমিগ্রেশন ক্লিয়ারেন্স:</strong> সরকারি ফিঙ্গারপ্রিন্টিং, প্রি-ডিপার্চার ওরিয়েন্টেশন ব্রিফিং এবং বিএমইটি স্মার্ট কার্ড ইস্যু।</li>
</ol>

<div class="blog-callout blog-warning">
    <div class="callout-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
    <div class="callout-content">
        <h5>গুরুত্বপূর্ণ অ্যান্টি-ফ্রড পরামর্শ</h5>
        <p>সবসময় যাচাই করুন যে আপনার নিয়োগকারী অংশীদারের একটি খাঁটি সরকারি রিক্রুটিং লাইসেন্স (RL) আছে কিনা। আল ফাহিম ইন্টারন্যাশনালে, প্রতিটি প্রার্থী একটি অফিসিয়াল কম্পিউটারাইজড রসিদ পায় এবং অনলাইনে ২৪/৭ তাদের ভিসা ফাইলের অবস্থা ট্র্যাক করতে পারে।</p>
    </div>
</div>
HTML;

        $descUaeBn = <<<'HTML'
<p class="lead">সংযুক্ত আরব আমিরাত—<strong>দুবাই, আবুধাবি এবং শারজাহের</strong> মতো গতিশীল মেট্রোপলিটন হাবগুলির উপর ভিত্তি করে—উচ্চ-প্রবৃদ্ধির প্রবাসী কর্মসংস্থানের জন্য বিশ্বব্যাপী মানদণ্ড নির্ধারণ করে চলেছে। সবুজ বিল্ডিং অবকাঠামো, বিমান চালনা লজিস্টিকস, আন্তর্জাতিক বাণিজ্য এবং বাণিজ্যিক রিয়েল এস্টেটের ব্যাপক সম্প্রসারণের সাথে সাথে, সংযুক্ত আরব আমিরাতে বিদেশী নিয়োগ <strong>মানবসম্পদ ও আমিরাতীকরণ মন্ত্রণালয়ের (MoHRE)</strong> অধীনে কঠোর স্বচ্ছতা গ্রহণ করেছে।</p>

<h2>১. মোহরে (MoHRE) ইলেকট্রনিক কোটা এবং প্রমিত জব অফার লেটার</h2>
<p>সংযুক্ত আরব আমিরাতে নিয়োগ প্রক্রিয়া একটি অত্যন্ত কাঠামোগত, ডিজিটাইজড পদ্ধতি অনুসরণ করে যা চুক্তি প্রতিস্থাপন দূর করতে এবং প্রথম যোগাযোগ থেকেই কর্মীদের অধিকার রক্ষা করার জন্য ডিজাইন করা হয়েছে।</p>

<p>নিয়োগ প্রক্রিয়া শুরু হয় যখন একটি লাইসেন্সপ্রাপ্ত সংযুক্ত আরব আমিরাত এন্টারপ্রাইজ একটি ইলেকট্রনিক কোটা আবেদন জমা দেয়। একবার MoHRE দ্বারা অনুমোদিত হলে, মন্ত্রণালয় ইংরেজি এবং প্রার্থীর স্থানীয় ভাষা উভয় ফর্ম্যাটে একটি <strong>প্রমিত জব অফার লেটার</strong> তৈরি করে। মূল আইনি সুরক্ষাগুলির মধ্যে রয়েছে:</p>
<ul>
    <li><strong>বাধ্যতামূলক ক্ষতিপূরণ ব্রেকডাউন:</strong> মূল মজুরি, আবাসন ভাতা, পরিবহন ভাতা এবং মাসিক ইউটিলিটির স্পষ্ট বিভাজন।</li>
    <li><strong>কাজের সময় এবং বিশ্রামের দিন:</strong> সাধারণ ৮-ঘণ্টার কর্মদিবস, প্রতি সপ্তাহে সর্বোচ্চ ৪৮ ঘণ্টা এবং একটি বাধ্যতামূলক বেতনভুক্ত বিশ্রামের দিন।</li>
    <li><strong>স্বাস্থ্য বীমা শ্রেণীবিভাগ:</strong> নিয়োগকর্তা-অর্থায়নে বাধ্যতামূলক চিকিৎসা বীমা পলিসি যা মোতায়েনের প্রথম দিন থেকে কার্যকর।</li>
    <li><strong>প্রবেশন নিয়ম:</strong> পারস্পরিক ১৪ দিনের লিখিত নোটিশের প্রয়োজনীয়তা সহ সর্বোচ্চ ৬ মাসের বিধিবদ্ধ প্রবেশন সময়কাল।</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-file-contract"></i></div>
    <div class="callout-content">
        <h5>দ্বিভাষিক চুক্তি সুরক্ষা</h5>
        <p>ইউএই ফেডারেল ডিক্রি-ল নং ৩৩, ২০২১ এর অধীনে, আপনার স্বাক্ষরিত MoHRE অফার লেটারে বর্ণিত শর্তাবলী দুবাই বা আবুধাবিতে পৌঁছানোর পরে কম অনুকূল শর্তাবলীতে পরিবর্তন করা যাবে না। আপনার স্বাক্ষরিত অফার লেটার ইউএই শ্রম আদালতে আইনত প্রয়োগযোগ্য।</p>
    </div>
</div>

<h2>২. চাহিদাসম্পন্ন সংযুক্ত আরব আমিরাতের ট্রেড এবং ক্ষতিপূরণ ম্যাট্রিক্স (২০২৬)</h2>
<p>নিচে দুবাই এবং আবুধাবি জুড়ে আল ফাহিম ইন্টারন্যাশনাল দ্বারা মোতায়েন করা যাচাইকৃত কর্পোরেট কোটার জন্য বর্তমান বাজারের বেতন হার দেওয়া হলো:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ট্রেড পদবি</th>
                <th>মূল মাসিক বেতন (AED)</th>
                <th>ওভারটাইম হার</th>
                <th>আবাসন ও পরিবহন</th>
                <th>ভিসার বৈধতা</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>কমার্শিয়াল এইচভিএসি (HVAC) টেকনিশিয়ান</strong></td>
                <td>AED ২,২০০ – ৩,৪০০</td>
                <td>১.২৫x – ১.৫x ঘণ্টায়</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>বিল্ডিং ইলেকট্রিশিয়ান / প্লাম্বার</strong></td>
                <td>AED ১,৮০০ – ২,৬০০</td>
                <td>১.২৫x – ১.৫x ঘণ্টায়</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>সিকিউরিটি গার্ড (SIRA / PSBD সার্টিফাইড)</strong></td>
                <td>AED ২,০০০ – ২,৮০০</td>
                <td>নির্ধারিত ওভারটাইম টিয়ার</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>স্ট্রাকচারাল স্টিল ফেব্রিকেটর / ফিটার</strong></td>
                <td>AED ১,৯০০ – ২,৭০০</td>
                <td>১.২৫x – ১.৫x ঘণ্টায়</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>ওয়্যারহাউস লজিস্টিকস ও ফর্কলিফ্ট অপারেটর</strong></td>
                <td>AED ২,০০০ – ৩,০০০</td>
                <td>১.২৫x – ১.৫x ঘণ্টায়</td>
                <td>কোম্পানি প্রদত্ত</td>
                <td>২ বছর (নবায়নযোগ্য)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>৩. ৪-পর্যায়ের ডিপ্লয়মেন্ট পাইপলাইন</h2>
<p>একটি প্রমাণীকৃত ইউএই কর্মসংস্থান ভিসার প্রক্রিয়াকরণ চক্র সাধারণত নিম্নলিখিত সুবিন্যস্ত পর্যায়গুলির মাধ্যমে <strong>১৮ থেকে ২৮ কর্মদিবস</strong> সময় নেয়:</p>

<ol>
    <li><strong>MoHRE অফার লেটার এবং ইলেকট্রনিক ওয়ার্ক পারমিট:</strong> কোটা যাচাইকরণ, ইলেকট্রনিক স্বাক্ষর এবং কর্মসংস্থানের জন্য ৬০ দিনের এন্ট্রি পারমিট ইস্যু।</li>
    <li><strong>বিএমইটি ইমিগ্রেশন ক্লিয়ারেন্স:</strong> কর্মসংস্থান ভিসা সত্যায়ন, বায়োমেট্রিক ফিঙ্গারপ্রিন্টিং, প্রি-ডিপার্চার সেফটি ব্রিফিং এবং বিএমইটি স্মার্ট কার্ড ইস্যু।</li>
    <li><strong>এয়ারপোর্ট ট্রানজিট এবং অ্যারাইভাল ওয়েলকাম:</strong> দুবাই (DXB) বা আবুধাবি (AUH) বিমানবন্দর থেকে কোম্পানির আবাসনে নিবেদিত মিট-অ্যান্ড-অ্যাসিস্ট ট্রান্সফার।</li>
    <li><strong>প্রিভেন্টিভ মেডিসিন স্ক্রীনিং এবং এমিরেটস আইডি:</strong> দেশে মেডিকেল ফিটনেস স্ক্রীনিং (বুকের এক্স-রে, রক্ত পরীক্ষা), আইসিপি (ICP) কেন্দ্রগুলিতে বায়োমেট্রিক তালিকাভুক্তি এবং ফিজিক্যাল ২-বছরের এমিরেটস আইডি ইস্যু।</li>
</ol>

<blockquote>
    <p>"ইনভলান্টারি লস অফ এমপ্লয়মেন্ট (ILOE) ইন্স্যুরেন্স স্কিম এবং ইলেকট্রনিক ওয়েজ প্রোটেকশন সিস্টেম (WPS) বাস্তবায়নের সাথে সাথে, সংযুক্ত আরব আমিরাত বিশ্বব্যাপী বিদেশী কর্মীদের জন্য সবচেয়ে নিরাপদ সামাজিক নিরাপত্তা কাঠামো প্রদান করে।"</p>
    <cite>— ইউএই লেবার ল রেগুলেটরি ওভারভিউ</cite>
</blockquote>

<h2>৪. বাধ্যতামূলক কর্মী কল্যাণ গ্যারান্টি</h2>
<p>আমাদের অফিসিয়াল ভিসা বরাদ্দের অধীনে মোতায়েন করা প্রতিটি কর্মী নিম্নলিখিত সুবিধা পান:</p>
<ul>
    <li><strong>ওয়েজ প্রোটেকশন সিস্টেম (WPS):</strong> বেতন প্রতি মাসের ৫ তারিখের মধ্যে ইলেকট্রনিকভাবে ব্যক্তিগত ব্যাঙ্ক অ্যাকাউন্ট বা C3 পেরোল কার্ডে বিতরণ করা হয়।</li>
    <li><strong>ইনভলান্টারি লস অফ এমপ্লয়মেন্ট (ILOE):</strong> অনৈচ্ছিক চাকরি হারানোর ক্ষেত্রে মূল বেতনের ৬০% পর্যন্ত আর্থিক নিরাপত্তা জাল প্রদান করে।</li>
    <li><strong>বার্ষিক বেতনের ছুটি:</strong> প্রতিটি ২-বছরের মেয়াদ শেষ হওয়ার পরে কোম্পানি-প্রদত্ত রিটার্ন এয়ার টিকিট সহ ৩০ ক্যালেন্ডার দিনের বার্ষিক বেতনের ছুটি।</li>
</ul>
HTML;

        $descMaldivesBn = <<<'HTML'
<p class="lead">মালদ্বীপ প্রজাতন্ত্র বর্তমানে একটি অভূতপূর্ব অর্থনৈতিক নবজাগরণের মধ্য দিয়ে যাচ্ছে। ১৭০ টিরও বেশি অতি-বিলাসবহুল আইল্যান্ড রিসোর্টের জন্য বিশ্বজুড়ে বিখ্যাত, এই দ্বীপপুঞ্জটি <strong>ভেলানা আন্তর্জাতিক বিমানবন্দর সম্প্রসারণ</strong>, <strong>গ্রেটার মালে কানেক্টিভিটি ব্রিজ</strong> এবং লাক্সারি ইকো-অ্যাটল ডেভেলপমেন্ট সহ রূপান্তরমূলক নাগরিক অবকাঠামোতে বিলিয়ন ডলার বিনিয়োগ করছে।</p>

<h2>১. এক্সপ্যাট (Xpat) অনলাইন সিস্টেম এবং এমপ্লয়মেন্ট অ্যাপ্রুভাল (EA)</h2>
<p>মালদ্বীপে বিদেশী নিয়োগ <strong>হোমল্যান্ড সিকিউরিটি এবং টেকনোলজি মন্ত্রণালয়</strong> দ্বারা কেন্দ্রীভূত <strong>এক্সপ্যাট অনলাইন পোর্টালের</strong> মাধ্যমে কঠোরভাবে নিয়ন্ত্রিত হয়। এই আধুনিক ডিজিটাল আর্কিটেকচার নিশ্চিত করে যে শুধুমাত্র যাচাইকৃত বিদেশী কর্মী কোটা সহ স্বীকৃত কর্পোরেট নিয়োগকর্তারা আন্তর্জাতিক জনশক্তি নিয়োগ করতে পারে।</p>

<p>মালদ্বীপে ভ্রমণকারী যেকোনো বিদেশী কর্মীর পূর্বশর্ত হলো <strong>এমপ্লয়মেন্ট অ্যাপ্রুভাল (EA)</strong>। এই অফিসিয়াল সরকারী নথিটি ইলেকট্রনিকভাবে তৈরি হয় এবং যাচাই করে:</p>
<ul>
    <li><strong>অনুমোদিত নিয়োগকর্তা কোটা:</strong> দ্বীপ রিসোর্ট বা নির্মাণকারী প্রতিষ্ঠানের অনুমোদিত বিদেশী কর্মী শূন্যপদ আছে কিনা তা নিশ্চিত করা।</li>
    <li><strong>নির্ধারিত দ্বীপের অবস্থান:</strong> নির্দিষ্ট রিসোর্ট দ্বীপ, অ্যাটল বা নির্ধারিত নির্মাণ সাইট নিশ্চিত করা।</li>
    <li><strong>মার্কিন ডলারে (USD) বেতন:</strong> ন্যূনতম বেতনের কমপ্লায়েন্স সহ ইউএস ডলারে সরাসরি মাসিক উপার্জন।</li>
    <li><strong>সব-অন্তর্ভুক্ত দ্বীপ বিধান:</strong> শীতাতপ নিয়ন্ত্রিত কর্মী কোয়ার্টার, দৈনিক গুরমেট ডাইনিং, লন্ড্রি পরিষেবা এবং স্বাস্থ্যসেবা সুবিধার বাধ্যতামূলক ব্যবস্থা।</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-umbrella-beach"></i></div>
    <div class="callout-content">
        <h5>সব-অন্তর্ভুক্ত রিসোর্ট সুবিধা</h5>
        <p>রিসোর্ট দ্বীপ কর্মসংস্থানে, কর্মীদের আবাসন, তিন বেলার খাবার, জিম অ্যাক্সেস, মেডিকেল ক্লিনিক এবং বিনোদনমূলক সুবিধাগুলি ১০০% বিনামূল্যে। প্রবাসী কর্মীরা প্রতি মাসে তাদের নিট বেতনের প্রায় ৮৫% থেকে ৯০% সাশ্রয় করতে পারে।</p>
    </div>
</div>

<h2>২. মালদ্বীপ রিসোর্ট এবং ইঞ্জিনিয়ারিং ক্ষতিপূরণ ম্যাট্রিক্স</h2>
<p>মালদ্বীপে ৫-স্টার আইল্যান্ড রিসোর্ট এবং প্রধান সিভিল ঠিকাদারদের মধ্যে প্রচলিত ক্ষতিপূরণ প্যাকেজ:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>কাজের বিভাগ</th>
                <th>মূল মাসিক বেতন (USD)</th>
                <th>মাসিক সার্ভিস চার্জ / টিপস</th>
                <th>থাকা-খাওয়া</th>
                <th>ফ্লাইট এনটাইটেলমেন্ট</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>রিসোর্ট কমি শেফ / বেকার</strong></td>
                <td>USD $৪৫০ – $৭৫০</td>
                <td>USD $৩০০ – $৬০০/মাস</td>
                <td>বিনামূল্যে লাক্সারি স্টাফ ভিলেজ</td>
                <td>বার্ষিক রাউন্ড-ট্রিপ ফ্লাইট</td>
            </tr>
            <tr>
                <td><strong>F&B ওয়েটার / বারটেন্ডার</strong></td>
                <td>USD $৪০০ – $৬৫০</td>
                <td>USD $৩৫০ – $৭০০/মাস</td>
                <td>বিনামূল্যে লাক্সারি স্টাফ ভিলেজ</td>
                <td>বার্ষিক রাউন্ড-ট্রিপ ফ্লাইট</td>
            </tr>
            <tr>
                <td><strong>ভিলা হাউসকিপিং অ্যাটেনডেন্ট</strong></td>
                <td>USD $৩৫০ – $৫৫০</td>
                <td>USD $৩০০ – $৫৫০/মাস</td>
                <td>বিনামূল্যে লাক্সারি স্টাফ ভিলেজ</td>
                <td>বার্ষিক রাউন্ড-ট্রিপ ফ্লাইট</td>
            </tr>
            <tr>
                <td><strong>মেরিন ডিজেল মেকানিক</strong></td>
                <td>USD $৫০০ – $৮০০</td>
                <td>USD $২০০ – $৪০০/মাস</td>
                <td>বিনামূল্যে আবাসন ও খাবার</td>
                <td>বার্ষিক রাউন্ড-ট্রিপ ফ্লাইট</td>
            </tr>
            <tr>
                <td><strong>RO ডেসালিনেশন প্ল্যান্ট অপারেটর</strong></td>
                <td>USD $৪৫০ – $৭০০</td>
                <td>USD $১৫০ – $৩০০/মাস</td>
                <td>বিনামূল্যে আবাসন ও খাবার</td>
                <td>বার্ষিক রাউন্ড-ট্রিপ ফ্লাইট</td>
            </tr>
            <tr>
                <td><strong>সিভিল কনস্ট্রাকশন রাজমিস্ত্রি / কার্পেন্টার</strong></td>
                <td>USD $৩৫০ – $৫০০</td>
                <td>ওভারটাইম ভাতা</td>
                <td>বিনামূল্যে আবাসন ও খাবার</td>
                <td>দ্বি-বার্ষিক রাউন্ড-ট্রিপ ফ্লাইট</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>৩. মালে আন্তর্জাতিক বিমানবন্দরে পৌঁছানোর পর প্রোটোকল</h2>
<p>মালেতে ভেলানা আন্তর্জাতিক বিমানবন্দরে অবতরণের পর, প্রার্থীরা একটি সুবিন্যস্ত আইনি আগমন প্রোটোকল অনুসরণ করে:</p>

<ol>
    <li><strong>এমপ্লয়মেন্ট অ্যাপ্রুভাল সহ ইমিগ্রেশন ক্লিয়ারেন্স:</strong> ১৫ দিনের ট্রানজিট এন্ট্রি স্ট্যাম্পের জন্য বিশেষায়িত এক্সপ্যাট ইমিগ্রেশন কাউন্টারে অফিসিয়াল প্রিন্ট করা EA কপি এবং পাসপোর্ট উপস্থাপন।</li>
    <li><strong>নিয়োগকর্তার প্রতিনিধি ট্রান্সফার:</strong> সরাসরি নির্ধারিত রিসোর্ট অ্যাটল বা প্রকল্প ঘাঁটিতে স্পিডবোট বা ডোমেস্টিক সিপ্লেন ট্রান্সফার।</li>
    <li><strong>ইন-কান্ট্রি বায়ো-মেডিকেল স্ক্রীনিং:</strong> ১৫ দিনের মধ্যে একটি অনুমোদিত মালদ্বীপের ক্লিনিকে বাধ্যতামূলক মেডিকেল ফিটনেস টেস্ট (বুকের এক্স-রে, রক্ত পরীক্ষা) সম্পন্ন করা।</li>
    <li><strong>ফিজিক্যাল মালদ্বীপ ওয়ার্ক পারমিট কার্ড:</strong> বায়োমেট্রিক কার্ড ইস্যু করা যা অফিসিয়াল আইনি বাসস্থান এবং কর্মসংস্থান অনুমোদন দেয়।</li>
</ol>

<blockquote>
    <p>"মালদ্বীপের রিসোর্ট শিল্পে কাজ করার অনন্য দিক হল মাসিক সার্ভিস চার্জ। সর্বোচ্চ পর্যটন মৌসুমে (নভেম্বর থেকে এপ্রিল), সার্ভিস চার্জ বোনাসগুলি প্রায়শই মূল মাসিক বেতনের সাথে মেলে বা ছাড়িয়ে যেতে পারে।"</p>
    <cite>— আল ফাহিম আইল্যান্ড রিক্রুটমেন্ট স্পেশালিস্ট</cite>
</blockquote>

<h2>৪. ফ্লাইট প্রস্থানের আগে প্রার্থীর চেকলিস্ট</h2>
<ul>
    <li>কমপক্ষে ১২ মাসের মেয়াদ সহ মূল আন্তর্জাতিক পাসপোর্ট।</li>
    <li>এক্সপ্যাট এমপ্লয়মেন্ট অ্যাপ্রুভাল (EA)-এর অফিসিয়াল রঙিন কপি।</li>
    <li>প্রবাসী কল্যাণ মন্ত্রণালয় থেকে সার্টিফাইড বিএমইটি ইমিগ্রেশন স্মার্ট কার্ড।</li>
    <li>প্রি-ডিপার্চার বায়ো-মেডিকেল ফিটনেস সার্টিফিকেট।</li>
    <li>সত্যায়িত ট্রেড সার্টিফিকেট (হসপিটালিটি, রন্ধনসম্পর্কীয় এবং মেরিন ইঞ্জিনিয়ারিং ট্রেডের জন্য)।</li>
</ul>
HTML;

        $descMalaysiaBn = <<<'HTML'
<p class="lead">দক্ষিণ-পূর্ব এশিয়ার অন্যতম প্রধান উত্পাদন, ইলেকট্রনিক্স এবং কৃষি-শিল্প পাওয়ারহাউস হিসেবে, মালয়েশিয়া বিদেশী কর্মীদের জন্য উচ্চ-পরিমাণ, নির্ভরযোগ্য কর্মসংস্থান অফার করে চলেছে। <strong>মানবসম্পদ মন্ত্রণালয় (KESUMA)</strong> এবং <strong>মালয়েশিয়ার ইমিগ্রেশন বিভাগ (JIM)</strong> দ্বারা যৌথভাবে পরিচালিত, আইনি নিয়োগ সরকার-অনুমোদিত <strong>ভিসা উইথ রেফারেন্স (VDR)</strong> সিস্টেমের মাধ্যমে পরিচালিত হয়, যা সর্বজনীনভাবে <strong>কলিং ভিসা</strong> নামে পরিচিত।</p>

<h2>১. FWCMS সেন্ট্রালাইজড ডিজিটাল পাইপলাইন</h2>
<p>মালয়েশিয়ায় সম্পূর্ণ নিয়োগ প্রক্রিয়াটি <strong>ফরেন ওয়ার্কার্স সেন্ট্রালাইজড ম্যানেজমেন্ট সিস্টেম (FWCMS)</strong> এর মাধ্যমে সম্পূর্ণ ডিজিটাইজড। এই অত্যাধুনিক ফ্রেমওয়ার্ক নথি জালিয়াতি রোধ করে এবং নিয়োগকর্তা এবং নিয়োগকারী সংস্থা উভয়ের মধ্যে সম্পূর্ণ জবাবদিহিতা প্রয়োগ করে।</p>

<p>FWCMS পাইপলাইন গ্যারান্টি দেয় যে:</p>
<ul>
    <li><strong>KDN কোটা অনুমোদন:</strong> নিয়োগকারী নিয়োগকর্তার কাছে স্বরাষ্ট্র মন্ত্রণালয় (KDN) দ্বারা জারি করা যাচাইকৃত নিয়োগের অনুমোদন রয়েছে।</li>
    <li><strong>প্রি-ডিপার্চার বায়োমেট্রিক হেলথ ক্লিয়ারেন্স:</strong> প্রার্থীর মেডিকেল ডেটা অনুমোদিত মেডিকেল সেন্টারে বায়োমেট্রিকভাবে সংগ্রহ করা হয় এবং সরাসরি মালয়েশিয়ার ইমিগ্রেশনে পাঠানো হয়।</li>
    <li><strong>বিধিবদ্ধ ন্যূনতম মজুরি কমপ্লায়েন্স:</strong> চুক্তিগুলি কঠোরভাবে মালয়েশিয়ার বিধিবদ্ধ ন্যূনতম মজুরি (RM ১,৫০০ – RM ১,৮০০) পালন করে, সাথে আনুষ্ঠানিক ওভারটাইম বেতনের হিসাব।</li>
    <li><strong>বাধ্যতামূলক SOCSO সুরক্ষা:</strong> সোশ্যাল সিকিউরিটি অর্গানাইজেশন (SOCSO) স্কিমে সম্পূর্ণ অন্তর্ভুক্তি যা কর্মক্ষেত্রে আঘাত, অক্ষমতা এবং ইনভ্যালিডিটি সুবিধাগুলি কভার করে।</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-shield-halved"></i></div>
    <div class="callout-content">
        <h5>অফিসিয়াল কলিং ভিসা (VDR) যাচাইকরণ</h5>
        <p>একটি আসল কলিং ভিসায় একটি অনন্য সরকারি QR কোড এবং অনুমোদন রেফারেন্স নম্বর অন্তর্ভুক্ত থাকে যা মালয়েশিয়া পোর্টালের অফিসিয়াল ইমিগ্রেশন ডিপার্টমেন্টে যাচাইযোগ্য। পর্যটক বা ট্রানজিট ভিসা রূপান্তরের প্রস্তাব দেওয়া এজেন্টদের কখনই বিশ্বাস করবেন না—এই ধরনের অনুশীলন মালয়েশিয়ার আইনের অধীনে বেআইনি।</p>
    </div>
</div>

<h2>২. ২০২৬ মালয়েশিয়ান ইন্ডাস্ট্রির বেতন ও ওভারটাইম গাইডলাইন</h2>
<p>যাচাইকৃত মালয়েশিয়ান কর্পোরেট নিয়োগকর্তাদের জন্য প্রমিত মজুরি কাঠামো এবং বিধিবদ্ধ সুবিধা:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ইন্ডাস্ট্রি সেক্টর</th>
                <th>মূল মাসিক মজুরি (MYR)</th>
                <th>ওভারটাইম মাল্টিপ্লায়ার</th>
                <th>হোস্টেল এবং মেডিকেল কেয়ার</th>
                <th>পাসের ধরন</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>সেমিকন্ডাক্টর ও ইলেকট্রনিক্স অ্যাসেম্বলি</strong></td>
                <td>RM ১,৫০০ – ১,৯০০</td>
                <td>১.৫x সাধারণ / ২.০x বিশ্রামের দিন</td>
                <td>সেন্ট্রালাইজড হোস্টেল প্রদত্ত</td>
                <td>PLKS (বার্ষিক নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>অটোমোটিভ ও মেটাল ফেব্রিকেশন</strong></td>
                <td>RM ১,৬০০ – ২,১০০</td>
                <td>১.৫x সাধারণ / ২.০x বিশ্রামের দিন</td>
                <td>সেন্ট্রালাইজড হোস্টেল প্রদত্ত</td>
                <td>PLKS (বার্ষিক নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>প্লাস্টিক ও রাবার মোল্ডিং ফ্যাক্টরি</strong></td>
                <td>RM ১,৫০০ – ১,৮৫০</td>
                <td>১.৫x সাধারণ / ২.০x বিশ্রামের দিন</td>
                <td>সেন্ট্রালাইজড হোস্টেল প্রদত্ত</td>
                <td>PLKS (বার্ষিক নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>সিভিল কনস্ট্রাকশন ও ইনফ্রাস্ট্রাকচার</strong></td>
                <td>RM ১,৬০০ – ২,২০০</td>
                <td>১.৫x সাধারণ / ২.০x বিশ্রামের দিন</td>
                <td>অন-সাইট কোয়ার্টার প্রদত্ত</td>
                <td>PLKS (বার্ষিক নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>প্লান্টেশন ও অ্যাগ্রো-প্রসেসিং</strong></td>
                <td>RM ১,৫০০ – ১,৮০০</td>
                <td>ইনসেনটিভ পিস-রেট বিকল্প</td>
                <td>এস্টেট হাউজিং প্রদত্ত</td>
                <td>PLKS (বার্ষিক নবায়নযোগ্য)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>৩. ধাপে ধাপে কলিং ভিসা (VDR) প্রক্রিয়া</h2>
<p>ইন্টারভিউ নির্বাচন থেকে কুয়ালালামপুর আন্তর্জাতিক বিমানবন্দরে (KLIA) অবতরণ পর্যন্ত:</p>

<ol>
    <li><strong>নিয়োগকর্তার ইন্টারভিউ ও নির্বাচন:</strong> মালয়েশিয়ান নিয়োগকারী কোম্পানির দ্বারা সরাসরি বা ভিডিও-কনফারেন্স ট্রেড নির্বাচন।</li>
    <li><strong>বায়োমেট্রিক মেডিকেল স্ক্রীনিং:</strong> একটি অনুমোদিত FWCMS-সংযুক্ত ক্লিনিকে প্রত্যয়িত মেডিকেল পরীক্ষা করানো।</li>
    <li><strong>VDR (কলিং ভিসা) ইস্যু:</strong> মালয়েশিয়ার ইমিগ্রেশন ডিপার্টমেন্ট অফিসিয়াল ইলেকট্রনিক ভিসা উইথ রেফারেন্স অনুমোদন জারি করে।</li>
    <li><strong>সিঙ্গেল এন্ট্রি ভিসা (SEV) স্ট্যাম্পিং:</strong> সিঙ্গেল-এন্ট্রি ভিসা এনডোর্সমেন্টের জন্য মালয়েশিয়ান হাইকমিশনে পাসপোর্ট জমা দেওয়া।</li>
    <li><strong>বিএমইটি ইমিগ্রেশন ক্লিয়ারেন্স:</strong> চূড়ান্ত সরকারি ছাড়পত্র, ব্রিফিং এবং বিএমইটি স্মার্ট কার্ড ইস্যু।</li>
    <li><strong>পোস্ট-অ্যারাইভাল FOMEMA মেডিকেল চেক:</strong> অফিসিয়াল বার্ষিক অস্থায়ী কর্মসংস্থান ভিজিট পাস (PLKS) স্টিকার পাওয়ার জন্য পৌঁছানোর ৩০ দিনের মধ্যে মালয়েশিয়ায় পরিচালিত দ্বিতীয় বাধ্যতামূলক বায়ো-মেডিকেল স্ক্রীনিং।</li>
</ol>

<blockquote>
    <p>"মালয়েশিয়ান কর্মসংস্থান আইনের অধীনে, নিয়োগকর্তাদের অবশ্যই পরিষ্কার, প্রত্যয়িত আবাসন প্রদান করতে হবে যা কর্মীদের ন্যূনতম আবাসন এবং সুবিধার মান আইন (Act 446) মেনে চলে।"</p>
    <cite>— মালয়েশিয়ান মানবসম্পদ মন্ত্রণালয় (KESUMA)</cite>
</blockquote>

<h2>৪. প্রার্থীদের জন্য প্রয়োজনীয় নথির চেকলিস্ট</h2>
<ul>
    <li>পাসপোর্ট যার ন্যূনতম ১৮ মাস মেয়াদ বাকি আছে।</li>
    <li>সত্যায়িত শিক্ষাগত বা কারিগরি সনদ (যেখানে প্রযোজ্য)।</li>
    <li>FWCMS বায়ো-মেডিকেল ফিটনেস ক্লিয়ারেন্স রিপোর্ট।</li>
    <li>বিশুদ্ধ সাদা ব্যাকগ্রাউন্ডের বিপরীতে চারটি পাসপোর্ট আকারের ছবি।</li>
    <li>পররাষ্ট্র মন্ত্রণালয় কর্তৃক সত্যায়িত পুলিশ ক্লিয়ারেন্স সার্টিফিকেট (PCC)।</li>
</ul>
HTML;

        $descRomaniaBn = <<<'HTML'
<p class="lead">পূর্ব ইউরোপের অন্যতম দ্রুত-বর্ধনশীল শিল্প অর্থনীতি হিসাবে—এবং এখন <strong>ইউরোপীয় শেনজেন জোনের</strong> একটি অবিচ্ছেদ্য সদস্য—রোমানিয়া ইউরোপীয় ইউনিয়নের মধ্যে মর্যাদাপূর্ণ, ইউরো-স্ট্যান্ডার্ড ক্যারিয়ার খুঁজছেন এমন বিদেশী দক্ষ এবং সাধারণ কর্মীদের জন্য প্রধান আইনি প্রবেশদ্বার উপস্থাপন করে। <strong>১,০০,০০০-এর বেশি ওয়ার্ক পারমিটের</strong> বার্ষিক সরকার-অনুমোদিত বিদেশী কর্মী কোটা সহ, রোমানিয়ান এন্টারপ্রাইজগুলি সক্রিয়ভাবে ডেডিকেটেড আন্তর্জাতিক প্রতিভা নিয়োগ করে।</p>

<h2>১. অফিসিয়াল কাজের অনুমোদন: আভিজ ডি মুঙ্কা (Aviz de Munca)</h2>
<p>রোমানিয়ান বিদেশী কর্মসংস্থান পাইপলাইন বুখারেস্টে <strong>জেনারেল ইন্সপেক্টরেট ফর ইমিগ্রেশন (IGI - Inspectoratul General pentru Imigrări)</strong> এর মাধ্যমে শুরু হয়। রোমানিয়ান দূতাবাসে যেকোনো ভিসার অনুরোধ করার আগে, স্পনসরকারী নিয়োগকর্তাকে অবশ্যই একটি অফিসিয়াল <strong>কাজের নোটিশ (Aviz de Munca)</strong> পেতে হবে।</p>

<p>Aviz de Munca সুরক্ষিত করার জন্য, রোমানিয়ান নিয়োগকর্তাকে অবশ্যই প্রমাণ করতে হবে:</p>
<ul>
    <li><strong>শ্রম বাজারের ন্যায্যতা:</strong> ন্যাশনাল এমপ্লয়মেন্ট এজেন্সি (ANOFM) এর মাধ্যমে প্রদর্শন করা যে শূন্যপদটি রোমানিয়ান বা ইইউ নাগরিকদের দ্বারা পূরণ করা যাবে না।</li>
    <li><strong>ক্লিন কর্পোরেট রেকর্ড:</strong> যাচাই করা যে নিয়োগকারী কোম্পানি আর্থিক প্রবিধানগুলি সম্পূর্ণরূপে মেনে চলছে এবং শ্রম লঙ্ঘনের কোনো রেকর্ড নেই।</li>
    <li><strong>প্রার্থীর যোগ্যতা যাচাইকরণ:</strong> কর্মীর পেশাদার অভিজ্ঞতা, পরিষ্কার অপরাধমূলক পটভূমি এবং শিক্ষাগত যোগ্যতার বৈধতা।</li>
    <li><strong>আইনত বাধ্যতামূলক বেতন:</strong> রোমানিয়ান সরকার কর্তৃক প্রতিষ্ঠিত জাতীয় স্থূল ন্যূনতম মজুরিতে বা তার উপরে অর্থ প্রদানের চুক্তিভিত্তিক প্রতিশ্রুতি।</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-passport"></i></div>
    <div class="callout-content">
        <h5>শেনজেন জোন সুবিধাসমূহ</h5>
        <p>শেনজেনে রোমানিয়ার একীভূতকরণের সাথে, রোমানিয়ান রেসিডেন্স পারমিট (Permis de Sedere) ধারণকারী বিদেশী কর্মীরা তাদের বেতনের ছুটির সময় অবসরের জন্য ২৯টি ইউরোপীয় দেশ জুড়ে সরলীকৃত আন্তঃসীমান্ত ভ্রমণ সুবিধা উপভোগ করেন।</p>
    </div>
</div>

<h2>২. রোমানিয়ান কর্মসংস্থান ক্ষতিপূরণ ও সুবিধা (২০২৬)</h2>
<p>নিচে রোমানিয়ার শীর্ষস্থানীয় সিভিল ইনফ্রাস্ট্রাকচার, লজিস্টিকস এবং ম্যানুফ্যাকচারিং কংগ্লোমারেট জুড়ে খাঁটি নিট উপার্জনের রেঞ্জ দেওয়া হলো:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>পেশাগত ট্রেড</th>
                <th>নিট মাসিক বেতন (€ ইউরো)</th>
                <th>ওভারটাইম সম্ভাবনা (€)</th>
                <th>আবাসন ও খাবার</th>
                <th>রেসিডেন্স পারমিট বৈধতা</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>ইন্ডাস্ট্রিয়াল ওয়েল্ডার (MIG/MAG / TIG)</strong></td>
                <td>€৮৫০ – €১,২৫০</td>
                <td>€২০০ – €৪০০/মাস</td>
                <td>নিয়োগকর্তা প্রদত্ত সুসজ্জিত অ্যাপার্টমেন্ট</td>
                <td>১ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>CNC মেশিন অপারেটর / মেশিনিস্ট</strong></td>
                <td>€৮০০ – €১,১৫০</td>
                <td>€১৫০ – €৩৫০/মাস</td>
                <td>নিয়োগকর্তা প্রদত্ত সুসজ্জিত অ্যাপার্টমেন্ট</td>
                <td>১ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>সিভিল কনস্ট্রাকশন রাজমিস্ত্রি / কার্পেন্টার</strong></td>
                <td>€৭৫০ – €১,০০০</td>
                <td>€১৫০ – €৩০০/মাস</td>
                <td>নিয়োগকর্তা প্রদত্ত সুসজ্জিত অ্যাপার্টমেন্ট</td>
                <td>১ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>ওয়্যারহাউস অর্ডার পিকার ও লজিস্টিকস</strong></td>
                <td>€৭০০ – €৯৫০</td>
                <td>€১০০ – €২৫০/মাস</td>
                <td>নিয়োগকর্তা প্রদত্ত সুসজ্জিত অ্যাপার্টমেন্ট</td>
                <td>১ বছর (নবায়নযোগ্য)</td>
            </tr>
            <tr>
                <td><strong>ফুড প্রসেসিং ও প্যাকেজিং অপারেটিভ</strong></td>
                <td>€৬৫০ – €৮৫০</td>
                <td>€১০০ – €২০০/মাস</td>
                <td>নিয়োগকর্তা প্রদত্ত সুসজ্জিত অ্যাপার্টমেন্ট</td>
                <td>১ বছর (নবায়নযোগ্য)</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>৩. ইউরোপীয় কর্মসংস্থানের ধাপে ধাপে পথ</h2>
<p>প্রাথমিক নথি সংকলন থেকে বুখারেস্ট, ক্লুজ-নাপোকা বা টিমিসোয়ারায় বসতি স্থাপন পর্যন্ত:</p>

<ol>
    <li><strong>নথি জমা এবং IGI পিটিশন:</strong> পাসপোর্ট স্ক্যান, অ্যাপোস্টিলড পুলিশ ক্লিয়ারেন্স সার্টিফিকেট (PCC) এবং কারিকুলাম ভিটা রোমানিয়ান নিয়োগকর্তার কাছে জমা দেওয়া।</li>
    <li><strong>Aviz de Munca অনুমোদন:</strong> জেনারেল ইন্সপেক্টরেট ফর ইমিগ্রেশন অফিসিয়াল ইলেকট্রনিক ওয়ার্ক অথরাইজেশন জারি করে (প্রক্রিয়া করতে প্রায় ৬ থেকে ১০ সপ্তাহ সময় লাগে)।</li>
    <li><strong>কনস্যুলার লং-স্টে ভিসা (টাইপ D/AM):</strong> রোমানিয়ান দূতাবাস বা কনস্যুলেটে ইন্টারভিউ এবং বায়োমেট্রিক ভিসা স্ট্যাম্পিং।</li>
    <li><strong>বিএমইটি ইমিগ্রেশন ক্লিয়ারেন্স:</strong> সরকারি ইমিগ্রেশন প্রসেসিং, বাধ্যতামূলক ব্রিফিং এবং বিএমইটি স্মার্ট কার্ড ইস্যু সম্পন্ন করা।</li>
    <li><strong>Permis de Sedere (অস্থায়ী রেসিডেন্স কার্ড):</strong> রোমানিয়ায় পৌঁছানোর পর, নিয়োগকর্তা ১ বছরের বায়োমেট্রিক ইউরোপীয় রেসিডেন্স কার্ড (Permis de Sedere) ইস্যু করার জন্য স্থানীয় ইমিগ্রেশন কর্তৃপক্ষের কাছে কর্মীকে নিবন্ধন করেন।</li>
</ol>

<blockquote>
    <p>"রোমানিয়ায় ৫ বছরের একটানা আইনি বসবাস এবং কর অবদানের পর, বিদেশী কর্মীরা লং-টার্ম ইইউ রেসিডেন্সির জন্য আবেদন করার আইনি যোগ্য হয়ে ওঠে, নিজেদের এবং তাদের পরিবারের জন্য একটি স্থায়ী ইউরোপীয় ভবিষ্যৎ সুরক্ষিত করে।"</p>
    <cite>— ইউরোপীয় মাইগ্রেশন ল ফ্রেমওয়ার্ক</cite>
</blockquote>

<h2>৪. স্ট্যান্ডার্ড ইউরোপীয় কর্মী সুরক্ষা</h2>
<ul>
    <li><strong>জাতীয় স্বাস্থ্য বীমা (CNAS):</strong> সরকারি হাসপাতালে সম্পূর্ণ চিকিৎসা কভারেজ এবং জরুরি স্বাস্থ্য পরিষেবা।</li>
    <li><strong>বার্ষিক বেতনের ছুটি:</strong> রোমানিয়ান লেবার কোডের অধীনে প্রতি বছর ন্যূনতম ২০ কর্মদিবসের বেতনের ছুটি।</li>
    <li><strong>আবাসন মান:</strong> রান্নাঘর এবং লন্ড্রি সুবিধা সহ পরিষ্কার, উত্তপ্ত এবং সুসজ্জিত অ্যাপার্টমেন্ট আবাসন।</li>
</ul>
HTML;

        $descGlobalBn = <<<'HTML'
<p class="lead">আন্তর্জাতিক শ্রম অভিবাসন ল্যান্ডস্কেপ তিন দশকেরও বেশি সময়ের মধ্যে তার সবচেয়ে রূপান্তরমূলক বিবর্তনের মধ্য দিয়ে যাচ্ছে। দ্বিপাক্ষিক সরকারী চুক্তি, ডিজিটাইজড ভেরিফিকেশন পোর্টাল, বাধ্যতামূলক মজুরি সুরক্ষা ব্যবস্থা এবং সর্বজনীন বায়োমেট্রিক স্ক্রীনিং নাটকীয়ভাবে বিদেশী কর্মীদের নিয়োগ এবং মোতায়েন করার পদ্ধতিকে নতুন আকার দিয়েছে। আর্থিক স্থিতিশীলতা খুঁজছেন এমন প্রার্থীদের জন্য, পাঁচটি পাওয়ারহাউস দেশ বিশ্বব্যাপী জনশক্তি নিয়োগের শীর্ষে দাঁড়িয়ে আছে: <strong>সৌদি আরব, সংযুক্ত আরব আমিরাত, মালদ্বীপ, মালয়েশিয়া এবং রোমানিয়া</strong>।</p>

<h2>১. ক্রস-কান্ট্রি তুলনামূলক বিশ্লেষণ: শীর্ষ ৫ গন্তব্য</h2>
<p>প্রার্থীদের এবং তাদের পরিবারকে তথ্যপূর্ণ, জীবন পরিবর্তনকারী সিদ্ধান্ত নিতে সাহায্য করার জন্য, নিম্নলিখিত ব্যাপক তুলনা বিশ্বের শীর্ষস্থানীয় গন্তব্য দেশগুলির কর্মক্ষম কাঠামোকে সংক্ষিপ্ত করে:</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>গন্তব্য দেশ</th>
                <th>প্রাথমিক গ্রোথ সেক্টর</th>
                <th>মাসিক নিট সঞ্চয় সম্ভাবনা</th>
                <th>প্রসেসিং টাইমলাইন</th>
                <th>মূল আইনি সুবিধা</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>সৌদি আরব</strong></td>
                <td>নিয়োম মেগাপ্রজেক্ট, সিভিল ইনফ্রাস্ট্রাকচার, এমইপি, ফ্যাসিলিটি কেয়ার</td>
                <td>SAR ১,৮০০ – ৩,৫০০/মাস ($৪৮০ – $৯৩০)</td>
                <td>৩০ – ৪৫ দিন</td>
                <td>কিওয়া ইলেকট্রনিক চুক্তি, শূন্য আয়কর, উচ্চ সঞ্চয়</td>
            </tr>
            <tr>
                <td><strong>সংযুক্ত আরব আমিরাত</strong></td>
                <td>কমার্শিয়াল কনস্ট্রাকশন, হসপিটালিটি, লজিস্টিকস, সিকিউরিটি</td>
                <td>AED ২,০০০ – ৪,০০০/মাস ($৫৪০ – $১,০৮০)</td>
                <td>২০ – ৩০ দিন</td>
                <td>MoHRE ওয়েজ প্রোটেকশন (WPS), ILOE ইন্স্যুরেন্স, মডার্ন লিভিং</td>
            </tr>
            <tr>
                <td><strong>মালদ্বীপ</strong></td>
                <td>লাক্সারি আইল্যান্ড রিসোর্ট, মেরিন ইঞ্জিনিয়ারিং, এয়ারপোর্ট এক্সপ্যানশন</td>
                <td>USD $৪০০ – $১,২০০/মাস ($৪০০ – $১,২০০)</td>
                <td>২৫ – ৩৫ দিন</td>
                <td>১০০% ফ্রি ফুড ও লজিং, মাসিক ইউএসডি সার্ভিস চার্জ</td>
            </tr>
            <tr>
                <td><strong>মালয়েশিয়া</strong></td>
                <td>ইলেকট্রনিক্স অ্যাসেম্বলি, প্রিসিশন ম্যানুফ্যাকচারিং, কনস্ট্রাকশন</td>
                <td>MYR ১,৮০০ – ৩,০০০/মাস ($৩৮০ – $৬৪০)</td>
                <td>৪০ – ৬০ দিন</td>
                <td>FWCMS কলিং ভিসা (VDR), কম জীবনযাত্রার ব্যয়, SOCSO সেফটি নেট</td>
            </tr>
            <tr>
                <td><strong>রোমানিয়া</strong></td>
                <td>ইন্ডাস্ট্রিয়াল ওয়েল্ডিং, CNC মেশিনিং, ওয়্যারহাউসিং, সিভিল ওয়ার্কস</td>
                <td>€৭৫০ – €১,৪০০/মাস ($৮২০ – $১,৫২০)</td>
                <td>৬০ – ৯০ দিন</td>
                <td>শেনজেন সদস্য, ইউরো মুদ্রা, স্থায়ী ইইউ রেসিডেন্সির পথ</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>২. আপনার প্রোফাইলের জন্য কীভাবে সর্বোত্তম দেশ বেছে নেবেন</h2>
<p>প্রতিটি গন্তব্য নির্দিষ্ট ক্যারিয়ার লক্ষ্য, দক্ষতার স্তর এবং পারিবারিক আর্থিক পরিকল্পনার সাথে সারিবদ্ধ:</p>

<ul>
    <li><strong>সর্বোচ্চ আর্থিক সঞ্চয়ের জন্য:</strong> সৌদি আরব এবং ইউএই শূন্য ব্যক্তিগত আয়কর এবং ব্যাপক নিয়োগকর্তা-প্রদত্ত বোর্ডিং সহ প্রযুক্তিগত এবং অবকাঠামোগত সুযোগের সর্বোচ্চ পরিমাণ প্রদান করে।</li>
    <li><strong>হসপিটালিটি এবং সার্ভিস ক্যারিয়ারের জন্য:</strong> মালদ্বীপ একটি অতুলনীয় ট্রপিক্যাল লাক্সারি কাজের পরিবেশ, মর্যাদাপূর্ণ আন্তর্জাতিক হোটেল ব্র্যান্ড সার্টিফিকেশন এবং লাভজনক ইউএস ডলার সার্ভিস চার্জ বোনাস অফার করে।</li>
    <li><strong>কারখানা এবং উৎপাদন ধারাবাহিকতার জন্য:</strong> মালয়েশিয়া পরিষ্কার হোস্টেল আবাসন, কঠোর ওভারটাইম প্রবিধান এবং বন্ধুত্বপূর্ণ সাংস্কৃতিক পরিচিতি সহ অনুমানযোগ্য, কাঠামোগত অ্যাসেম্বলি-লাইন ক্যারিয়ার প্রদান করে।</li>
    <li><strong>দীর্ঘমেয়াদী ইউরোপীয় বসতি স্থাপনের জন্য:</strong> রোমানিয়া ইউরোপীয় ইউনিয়ন এবং শেনজেন জোনে সরাসরি একীভূতকরণ সরবরাহ করে, যা দীর্ঘমেয়াদী রেসিডেন্সি এবং ইউরোপীয় পারিবারিক পুনর্মিলনের পথ খুলে দেয়।</li>
</ul>

<div class="blog-callout">
    <div class="callout-icon"><i class="fa-solid fa-award"></i></div>
    <div class="callout-content">
        <h5>আল ফাহিম রিয়েল-টাইম ক্যান্ডিডেট ট্র্যাকিং</h5>
        <p>আল ফাহিম ইন্টারন্যাশনালে নিবন্ধিত প্রতিটি আবেদনকারীকে একটি অনন্য ডিজিটাল ট্র্যাকিং কোড বরাদ্দ করা হয়। আপনি আমাদের অনলাইন পোর্টালের মাধ্যমে সরাসরি আপনার মেডিকেল স্ট্যাটাস, অ্যাম্বাসি ভিসা জমা, বিএমইটি ইমিগ্রেশন ক্লিয়ারেন্স এবং ফ্লাইট টিকিটিং নিরীক্ষণ করতে পারেন।</p>
    </div>
</div>

<h2>৩. নিরাপদ বিদেশী মাইগ্রেশনের জন্য ৫টি সুবর্ণ নিয়ম</h2>
<p>আপনার কষ্টার্জিত অর্থ রক্ষা করতে এবং সম্পূর্ণ আইনি নিরাপত্তা নিশ্চিত করতে, সর্বদা এই পাঁচটি অ-আলোচনাযোগ্য মান মেনে চলুন:</p>

<ol>
    <li><strong>সরকারি রিক্রুটমেন্ট লাইসেন্স যাচাই করুন:</strong> কখনও অনিবন্ধিত মধ্যস্থতাকারীদের সাথে লেনদেন করবেন না। সর্বদা নিশ্চিত করুন যে নিয়োগকারী এজেন্সির প্রবাসী কল্যাণ মন্ত্রণালয় দ্বারা স্বীকৃত একটি সক্রিয় লাইসেন্স (RL) রয়েছে।</li>
    <li><strong>অফিসিয়াল ব্যাঙ্ক রসিদ জোর দিন:</strong> কোম্পানির অফিসিয়াল সিল স্পষ্টভাবে প্রদর্শন করা একটি প্রমাণীকৃত কম্পিউটারাইজড রসিদ ছাড়া কখনই নগদ অর্থ প্রদান করবেন না।</li>
    <li><strong>ইলেকট্রনিক চুক্তি যাচাইয়ের দাবি করুন:</strong> নিশ্চিত করুন যে আপনার কর্মসংস্থান চুক্তি গন্তব্য দেশের সরকারি পোর্টালে (সৌদির জন্য কিওয়া, সংযুক্ত আরব আমিরাতের জন্য MoHRE, মালদ্বীপের জন্য এক্সপ্যাট, মালয়েশিয়ার জন্য FWCMS, রোমানিয়ার জন্য IGI) দৃশ্যমান।</li>
    <li><strong>বাধ্যতামূলক বায়ো-মেডিকেল স্ক্রীনিং সম্পন্ন করুন:</strong> সর্বদা একচেটিয়াভাবে সরকার-স্বীকৃত কেন্দ্রগুলিতে (ওয়াফিদ / গামকা, FWCMS, ইত্যাদি) ডায়াগনস্টিক পরীক্ষা করান।</li>
    <li><strong>আপনার বিএমইটি স্মার্ট কার্ড বহন করুন:</strong> বিধিবদ্ধ বীমা কভারেজের গ্যারান্টিযুক্ত বৈধ সরকারি ইমিগ্রেশন ক্লিয়ারেন্স (বিএমইটি স্মার্ট কার্ড) ছাড়া কখনই কোনো আন্তর্জাতিক ফ্লাইটে ওঠার চেষ্টা করবেন না।</li>
</ol>

<blockquote>
    <p>"বিদেশী কর্মসংস্থান কেবল একটি চাকরি নয়; এটি শ্রমিক এবং তাদের পরিবারের অর্থনৈতিক ক্ষমতায়নের জন্য একটি রূপান্তরমূলক সোপান। স্বচ্ছ, নৈতিক নিয়োগই একমাত্র মানদণ্ড যা দীর্ঘস্থায়ী সমৃদ্ধির নিশ্চয়তা দেয়।"</p>
    <cite>— আল ফাহিম ইন্টারন্যাশনাল ম্যানেজিং ডিরেক্টরেট</cite>
</blockquote>
HTML;

        $blogs = [
            [
                'category_id' => $catSaudi->id,
                'title' => 'Saudi Arabia Work Permit 2026: Qiwa Verified Contracts & GAMCA Medical Guide',
                'title_bn' => 'সৌদি আরব ওয়ার্ক পারমিট ২০২৬: কিওয়া যাচাইকৃত চুক্তি এবং গামকা মেডিকেল গাইড',
                'slug' => 'saudi-arabia-work-permit-2026-qiwa-gamca-guide',
                'description' => $descSaudi,
                'description_bn' => $descSaudiBn,
                'image' => 'upload/blog/saudi_manpower_news.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now()->subDays(2),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catUae->id,
                'title' => 'UAE Employment Visa 2026: MoHRE Work Permit Quota & Dubai Job Deployment Procedures',
                'title_bn' => 'সংযুক্ত আরব আমিরাত এমপ্লয়মেন্ট ভিসা ২০২৬: মোহরে ওয়ার্ক পারমিট কোটা এবং দুবাই জব ডিপ্লয়মেন্ট পদ্ধতি',
                'slug' => 'uae-employment-visa-2026-mohre-work-permit-procedures',
                'description' => $descUae,
                'description_bn' => $descUaeBn,
                'image' => 'upload/blog/uae_work_permit.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now()->subDays(3),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catMaldives->id,
                'title' => 'Maldives Work Permit & Quota System: High Demand for Resort Operations & Construction Workforce',
                'title_bn' => 'মালদ্বীপ ওয়ার্ক পারমিট এবং কোটা সিস্টেম: রিসোর্ট অপারেশন এবং নির্মাণ কর্মশক্তির উচ্চ চাহিদা',
                'slug' => 'maldives-work-permit-resort-construction-workforce',
                'description' => $descMaldives,
                'description_bn' => $descMaldivesBn,
                'image' => 'upload/blog/maldives_hospitality_jobs.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now()->subDays(4),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catMalaysia->id,
                'title' => 'Malaysia Calling Visa (VDR) 2026: Quota Clearances & Bio-Medical Regulations for Factory and Plantation Sectors',
                'title_bn' => 'মালয়েশিয়া কলিং ভিসা (VDR) ২০২৬: কারখানা এবং বৃক্ষরোপণ খাতের জন্য কোটা ছাড়পত্র এবং বায়ো-মেডিকেল রেগুলেশন',
                'slug' => 'malaysia-calling-visa-vdr-2026-quota-bio-medical-regulations',
                'description' => $descMalaysia,
                'description_bn' => $descMalaysiaBn,
                'image' => 'upload/blog/malaysia_calling_visa.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now()->subDays(5),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catRomania->id,
                'title' => 'Romania Work Permit (Aviz de Munca) 2026: Legal Pathways for Overseas Technical & General Workers to the EU',
                'title_bn' => 'রোমানিয়া ওয়ার্ক পারমিট (Aviz de Munca) ২০২৬: ইইউতে বিদেশী কারিগরি এবং সাধারণ কর্মীদের জন্য আইনি পথ',
                'slug' => 'romania-work-permit-aviz-de-munca-2026-eu-pathways',
                'description' => $descRomania,
                'description_bn' => $descRomaniaBn,
                'image' => 'upload/blog/romania_work_permit.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now()->subDays(6),
                'updated_at' => now(),
            ],
            [
                'category_id' => $catNews->id,
                'title' => 'Global Manpower Trends 2026: Why Saudi Arabia, UAE, Maldives, Malaysia, and Romania Lead Overseas Employment',
                'title_bn' => 'গ্লোবাল ম্যানপাওয়ার ট্রেন্ডস ২০২৬: কেন সৌদি আরব, ইউএই, মালদ্বীপ, মালয়েশিয়া এবং রোমানিয়া বিদেশী কর্মসংস্থানে নেতৃত্ব দেয়',
                'slug' => 'global-manpower-trends-2026-saudi-uae-maldives-malaysia-romania',
                'description' => $descGlobal,
                'description_bn' => $descGlobalBn,
                'image' => 'upload/blog/global_manpower_trends.jpg',
                'created_by' => 'AL FAHIM Team',
                'created_at' => now()->subDays(7),
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
