<?php

namespace App\Models;

use App\Services\GPSCalculations\GPSCalculationsService;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    const DUBLIN_GPS_COORDINATES = [
        'latitude' => 53.3340285,
        'longitude' => -6.2535495
    ];

    protected $fillable = ["latitude","affiliate_id","name","longitude"];

    public function checkDistanceToDublinOffice()
    {
        return GPSCalculationsService::vincentyGreatCircleDistance(
            $this->latitude,
            $this->longitude,
            self::DUBLIN_GPS_COORDINATES['latitude'],
            self::DUBLIN_GPS_COORDINATES['longitude']
        );
    }
}
