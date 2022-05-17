<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;

class AffiliatesController extends Controller
{
    public function getAffiliatesMap(){
        $affiliates = collect();
        foreach(file(public_path('affilates.txt')) as $row){
            $affiliate = new Affiliate((array) json_decode($row));
            if($affiliate->checkDistanceToDublinOffice() <= 100){
                $affiliates->push($affiliate);
            }
        }

        $affiliates = $affiliates->sortBy(fn($el) => $el->affiliate_id);

        return view('affiliates-map', compact('affiliates'));
    }
}
