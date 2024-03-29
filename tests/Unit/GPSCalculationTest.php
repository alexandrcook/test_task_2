<?php

namespace Tests\Unit;

use App\Models\Affiliate;
use App\Services\GPSCalculation\GPSCalculationService;
use Tests\TestCase;

class GPSCalculationTest extends TestCase
{
    /**
     * @dataProvider affiliates_less_or_equal_100km_distance
     */
    public function test_GPS_calculation_return_right_results_for_test_affiliates_less_or_equal_100km_distance($latitude,$affiliate_id,$name,$longitude)
    {
        $distance = GPSCalculationService::vincentyGreatCircleDistance(
            $latitude,
            $longitude,
            Affiliate::DUBLIN_GPS_COORDINATES['latitude'],
            Affiliate::DUBLIN_GPS_COORDINATES['longitude']
        );

        $this->assertTrue($distance <= 100);
    }

    /**
     * @dataProvider affiliates_more_than_100km_distance
     */
    public function test_GPS_calculation_return_right_results_for_test_affiliates_more_than_100km_distance($latitude,$affiliate_id,$name,$longitude)
    {
        $distance = GPSCalculationService::vincentyGreatCircleDistance(
            $latitude,
            $longitude,
            Affiliate::DUBLIN_GPS_COORDINATES['latitude'],
            Affiliate::DUBLIN_GPS_COORDINATES['longitude']
        );

        $this->assertFalse($distance <= 100);
    }


    public function affiliates_less_or_equal_100km_distance(){
        return [
                [
                    'latitude' => 52.986375,
                    'affiliate_id' => 12,
                    'name' => 'Yosef Giles',
                    'longitude' => -6.043701
                ],[
                    'latitude' => 54.0894797,
                    'affiliate_id' => 8,
                    'name' => 'Addison Lister',
                    'longitude' => -6.18671
                ],[
                    'latitude' => 53.038056,
                    'affiliate_id' => 26,
                    'name' => 'Moesha Bateman',
                    'longitude' => -7.653889
                ],[
                    'latitude' => 53.1229599,
                    'affiliate_id' => 6,
                    'name' => 'Jez Greene',
                    'longitude' => -6.2705202
                ],[
                    'latitude' => 53.2451022,
                    'affiliate_id' => 4,
                    'name' => 'Inez Blair',
                    'longitude' => -6.238335
                ],[
                    'latitude' => 53.1302756,
                    'affiliate_id' => 5,
                    'name' => 'Sharna Marriott',
                    'longitude' => -6.2397222
                ],[
                    'latitude' => 53.008769,
                    'affiliate_id' => 11,
                    'name' => 'Isla-Rose Hubbard',
                    'longitude' => -6.1056711
                ],[
                    'latitude' => 53.1489345,
                    'affiliate_id' => 31,
                    'name' => 'Maisha Mccarty',
                    'longitude' => -6.8422408
                ],[
                    'latitude' => 53,
                    'affiliate_id' => 13,
                    'name' => 'Terence Wall',
                    'longitude' => -7
                ],[
                    'latitude' => 52.966,
                    'affiliate_id' => 15,
                    'name' => 'Veronica Haines',
                    'longitude' => -6.463
                ],[
                    'latitude' => 54.180238,
                    'affiliate_id' => 17,
                    'name' => 'Gino Partridge',
                    'longitude' => -5.920898
                ],[
                    'latitude' => 53.0033946,
                    'affiliate_id' => 39,
                    'name' => 'Kirandeep Browning',
                    'longitude' => -6.3877505
                ],[
                    'latitude' => 53.74452,
                    'affiliate_id' => 29,
                    'name' => 'Alvin Stamp',
                    'longitude' => -7.11167
                ],[
                    'latitude' => 53.761389,
                    'affiliate_id' => 30,
                    'name' => 'Kingsley Vang',
                    'longitude' => -7.2875
                ],[
                    'latitude' => 54.080556,
                    'affiliate_id' => 23,
                    'name' => 'Ciara Bannister',
                    'longitude' => -6.361944
                ]
        ];
    }

    public function affiliates_more_than_100km_distance(){
        return [
            [
                'latitude' => 51.92893,
                'affiliate_id' => 1,
                'name' => 'Lance Keith',
                'longitude' => -10.27699
            ],[
                'latitude' => 51.8856167,
                'affiliate_id' => 2,
                'name' => 'Mohamed Bradshaw',
                'longitude' => -10.4240951
            ],[
                'latitude' => 52.3191841,
                'affiliate_id' => 3,
                'name' => 'Rudi Palmer',
                'longitude' => -8.5072391
            ],[
                'latitude' => 53.807778,
                'affiliate_id' => 28,
                'name' => 'Macsen Freeman',
                'longitude' => -7.714444
            ],[
                'latitude' => 53.4692815,
                'affiliate_id' => 7,
                'name' => 'Mikaeel Fenton',
                'longitude' => -9.436036
            ],[
                'latitude' => 54.1225,
                'affiliate_id' => 27,
                'name' => 'Roan Estes',
                'longitude' => -8.143333
            ],[
                'latitude' => 52.2559432,
                'affiliate_id' => 9,
                'name' => 'Macaulay Melia',
                'longitude' => -7.1048927
            ],[
                'latitude' => 52.240382,
                'affiliate_id' => 10,
                'name' => 'Maja Blevins',
                'longitude' => -6.972413
            ],[
                'latitude' => 51.999447,
                'affiliate_id' => 14,
                'name' => 'Zakariyah Bean',
                'longitude' => -9.742744
            ],[
                'latitude' => 52.366037,
                'affiliate_id' => 16,
                'name' => 'Linzi Carver',
                'longitude' => -8.179118
            ],[
                'latitude' => 52.228056,
                'affiliate_id' => 18,
                'name' => 'Gwen Rankin',
                'longitude' => -7.915833
            ],[
                'latitude' => 55.033,
                'affiliate_id' => 19,
                'name' => 'Aleisha Hayward',
                'longitude' => -8.112
            ],[
                'latitude' => 53.521111,
                'affiliate_id' => 20,
                'name' => 'Hadiya Terrell',
                'longitude' => -9.831111
            ],[
                'latitude' => 51.802,
                'affiliate_id' => 21,
                'name' => 'Keanu Oliver',
                'longitude' => -9.442
            ],[
                'latitude' => 54.374208,
                'affiliate_id' => 22,
                'name' => 'Shayna Potts',
                'longitude' => -8.371639
            ],[
                'latitude' => 52.833502,
                'affiliate_id' => 25,
                'name' => 'Tasneem Wolfe',
                'longitude' => -8.522366
            ]
        ];
    }
}
