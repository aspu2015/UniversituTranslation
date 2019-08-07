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
}
