<?php

namespace Tests\Unit;

use App\Models\Affiliate;
use App\Services\GPSCalculation\GPSCalculationService;
use Tests\TestCase;

class AffiliateListTest extends TestCase
{
    public function test_we_see_sorted_list_of_closest_affiliates_from_txt_file_on_page()
    {
        $response = $this->get(route('affiliates-list'));

        //check if affiliates data present in content data
        $this->assertTrue(isset($response->getOriginalContent()->getData()['affiliates']));

        //check if data is instance of Affiliate::class
        $responseDataAffiliatesCollection = $response->getOriginalContent()->getData()['affiliates'];

        foreach($responseDataAffiliatesCollection as $affiliate){
            $this->assertTrue($affiliate instanceof Affiliate);
        }

        //check if affiliates list is sorted properly
        $this->assertEquals(
            $responseDataAffiliatesCollection->pluck('affiliate_id'),
            $responseDataAffiliatesCollection->sortBy('affiliate_id')->pluck('affiliate_id')
        );
    }
}
