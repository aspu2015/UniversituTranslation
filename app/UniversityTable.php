<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UniversityTable extends Model
{

    public static function getAllUniversities(){

        $dictionary = DB::select('select dictionary.*, 
        languages.langName, 
        languages.picturePath, 
        languages.priority,
        dictionary_values.tagName
        from dictionary, languages, dictionary_values 
        where dictionary.language_id = languages.id 
        and dictionary.value_id = dictionary_values.id');

        $filtersTranslations =  DB::select('select translations.*, languages.langName, 
        languages.picturePath 
        from translations, languages 
        where translations.language_id = languages.id 
        and university_id <> 99999');

        $info = [$filtersTranslations, $dictionary];
        return $info;
    }

    public static function getAllOrganizations() {
        return DB::table('organizations')
        ->get();
    }

    public static function getAllCountries() {
        return DB::table('countries')
        ->get();;
    }
}