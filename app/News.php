<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class News extends Model
{
    public $timestamps = false;
    
    protected $table = 'news';  ///// Указываем таблицу ////
        protected $fillable = [
            'title', 'publicDate', 'published'
        ];


    public static function getAllNews(){
        return DB::select('select news.* from news');
    }

    public static function getAllTranslations($id){
        return DB::select('SELECT news_translation.*, languages.langName 
        FROM news_translation, languages 
        WHERE languages.id = news_translation.language_id 
        and news_id = ?', [$id]);
    }
}
