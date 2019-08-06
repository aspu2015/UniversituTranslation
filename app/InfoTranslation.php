<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class InfoTranslation extends Model
{
    public static function getCategories()
    {
        return DB::select('select * from info_category');
    }

    public static function getDictionary()
    {
        $filterTranslation = DB::select('select translations.*, languages.langName, 
        languages.picturePath, 
        universities.country_id, 
        universities.organization_id,
        universities.locality_id 
        from translations, languages, universities
        where translations.language_id = languages.id 
        and universities.id = translations.university_id');

        $dictionary = DB::select('select dictionary.*, 
        languages.langName, 
        languages.picturePath, 
        languages.priority,
        dictionary_values.tagName 
        from dictionary, languages, dictionary_values 
        where dictionary.language_id = languages.id 
        and dictionary.value_id = dictionary_values.id');

        $info = [$dictionary, $filterTranslation];

        return $info;
    }
    
}
