<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class InfoTranslation extends Model
{
    public function Language(){
        return $this->belongsTo('\App\Language');
    }

    public static function getAllOrganizations() {
        return DB::table('organizations')
        ->get();
    }
}