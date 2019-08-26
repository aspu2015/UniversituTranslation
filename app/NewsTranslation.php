<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class NewsTranslation extends Model
{
    public $timestamps = false;
    
    protected $table = 'news_translation';  ///// Указываем таблицу ////
        protected $fillable = [
            'language_id', 'news_id', 'news_title', 'news_text'
        ];


    public static function getAvalibleLangs($id){
        return DB::select('SELECT languages.id, 
        languages.langName 
        FROM languages WHERE
        languages.id NOT IN(SELECT news_translation.language_id 
        FROM news_translation, languages 
        WHERE languages.id = news_translation.language_id 
        AND news_translation.news_id = ?)',[$id]);
    }

    public static function getCurrentLanguage($lang_id){
        return DB::select('SELECT languages.id, languages.langName 
        FROM languages 
        WHERE languages.id = ?', [$lang_id]);
    }
}
