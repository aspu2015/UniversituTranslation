<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\University;
class UniversityCollection 
{
    public $type;
    public $features;
    public function __construct()
    {
        $this->type = "FeatureCollection";
        $this->features = [];
    }

    public function fillFeatures($univerities){
        for ($i=0; $i < count($univerities); $i++) { 
            $currentUniversity = $univerities[$i];
            $this->features[] = [
                "type"=>"Feature",
                "id"=>$i,
                "country"=>$currentUniversity->country_id,
                "organization"=>$currentUniversity->organization_id, ////// 16.07.19 22:29 /////////////
                "locality"=>$currentUniversity->locality_id,
                "universityId"=>$currentUniversity->id,
                "geometry"=>[
                    "type"=>"Point",
                    "coordinates"=> $currentUniversity->getGeometryAsArray()
                ],
                "properties"=>[
                    "balloonContentHeader"=>"<a style='color: #335dd4;' href='/university/info?id=".$currentUniversity->id."' target='_blank'>".$currentUniversity->name." </a>",
                    "balloonContentBody" => "<a style='color: #335dd4;' href='/university/info?id=".$currentUniversity->id."' target='_blank'>".$currentUniversity->description." </a>",
                    "balloonContentFooter" => " ",
                    "clusterCaption" => "<p>".$currentUniversity->name." </p>",
                    "hintContent" => $currentUniversity->name
                ]

            ];
        }
    }

    
}
