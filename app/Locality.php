<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    public $timestamps = false;
    
    public function university(){
        return $this->belongsTo('\App\University');
    }

    public static function getAllLocalities(){

        return DB::select('select localities.* 
        from localities, countries
        where translations.language_id = languages.id 
        and university_id <> 99999');
    }
    
}
