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
                'image' => 'upload/country/20240320082200.jpg',
                'description' => '<p>The Maldives offers exceptional overseas employment opportunities with comprehensive work permit and legal employment authorization. We provide end-to-end recruitment assistance, verified employment contracts, work permit processing, and legal deployment for candidates seeking careers in the Maldives.</p><p>All candidates receive complete assistance with Ministry of Economic Development work permit approval, medical clearances, visa stamping, and pre-departure briefings.</p>',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '2',
                'country_id' => '682', // Saudi Arabia
                'image' => 'upload/country/20240320082220.jpg',
                'description' => '<p>The Kingdom of Saudi Arabia remains one of the largest global employment hubs with massive infrastructure and economic expansion. We facilitate authentic work permit visas under the Qiwa and Musaned government platforms, ensuring full legal protection, transparent employment contracts, and prompt processing.</p><p>We guide applicants through GAMCA medical fitness tests, Saudi embassy visa stamping, BMET smart card clearance, and flight deployment.</p>',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '3',
                'country_id' => '784', // United Arab Emirates (Dubai)
                'image' => 'upload/country/20240320082245.jpg',
                'description' => '<p>Dubai and the United Arab Emirates provide vibrant overseas job opportunities with competitive salaries and world-class living standards. Our agency connects prospective workers with government-registered UAE employers offering official MOHRE employment entry permits and residence work visas.</p><p>We handle the complete cycle including entry permit issuance, medical screening, Emirates ID processing, BMET clearance, and overseas deployment.</p>',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '4',
                'country_id' => '458', // Malaysia
                'image' => 'upload/country/20240320082131.jpg',
                'description' => '<p>Malaysia is a premier destination for overseas employment across key industrial and service sectors. We process genuine Malaysian Calling Visas (Visa with Reference - VDR) in strict compliance with the Malaysian Ministry of Human Resources and Immigration Department regulations.</p><p>Our services include verified quota allocations, FOMEMA medical coordination, Malaysian High Commission visa endorsement, and government flight clearance.</p>',
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'id' => '5',
                'country_id' => '642', // Romania
                'image' => 'upload/country/20240320082200.jpg',
                'description' => '<p>Romania is an emerging European destination offering excellent career prospects and pathways to European residency. We facilitate legal Romanian Work Permits (Aviz de Munca) issued directly by the General Inspectorate for Immigration (IGI).</p><p>We provide comprehensive support covering work permit issuance from Romania, Romanian Embassy long-stay work visa (D/AM) stamping, apostille documentation, and pre-departure arrangements.</p>',
                'created_at' => now(),
                'updated_at' => now()
            ),
        );

        foreach ($country_details as $country_detail) {
            CountryDetails::updateOrCreate(['id' => $country_detail['id']], $country_detail);
        }
    }
}
