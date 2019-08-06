<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dictionary extends Model
{
    public $timestamps = false;
    
    public static function allLanguages(){
        return DB::select('select languages.id, languages.langName
        from languages 
        where languages.langCode <> "ru"');
    }

    public static function getAllValues($id){ //////////// !!!!! //////////////////
        return DB::select('select 
        dictionary_values.id as value_id, 
        dictionary_values.value, 
        dictionary_values.tagName 
        from dictionary_values, dictionary, languages 
        where dictionary_values.id not in( 
        select value_id from dictionary) 
        and dictionary.language_id = languages.id 
        and languages.id = ?',[$id]);
    }

    public static function getDictionary($id){
        return DB::select('select dictionary.*, 
        languages.id as langId, languages.langName,
        dictionary_values.id as value_id, 
        dictionary_values.value, 
        dictionary_values.tagName
        from dictionary, languages, dictionary_values
        where dictionary.language_id = languages.id 
        and dictionary.value_id = dictionary_values.id
        and languages.id = ?',[$id]);
    }
}
