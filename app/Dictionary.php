<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dictionary extends Model
{
    public $timestamps = false;
    
    protected $table = 'dictionary';  ///// Указываем таблицу ////
        protected $fillable = [
            'text', 'language_id', 'value_id'
        ];

    public static function allLanguages(){
        return DB::select('select languages.id, languages.langName
        from languages 
        where languages.langCode <> "ru"');
    }

    public static function getAllValues($id){ //////////// !!!!! //////////////////
        return DB::select('SELECT 
        dictionary_values.id as value_id, 
        dictionary_values.value, 
        dictionary_values.tagName 
        FROM dictionary_values WHERE
        dictionary_values.id NOT IN(SELECT dictionary.value_id 
        FROM dictionary, languages 
        WHERE languages.id = dictionary.language_id 
        AND dictionary.language_id = ?)',[$id]);
    }

    public static function getDictionary($id){
        return DB::select('select dictionary.*, 
        languages.langName,
        dictionary_values.value, 
        dictionary_values.tagName
        from dictionary, languages, dictionary_values
        where dictionary.language_id = languages.id 
        and dictionary.value_id = dictionary_values.id
        and languages.id = ?',[$id]);
    }

    public static function getCurrentDictionary($id){
        return DB::select('select dictionary.*, 
        dictionary_values.value  
        from dictionary, dictionary_values 
        where dictionary.value_id = dictionary_values.id
        and dictionary.id = ?', [$id]);
    }
}
