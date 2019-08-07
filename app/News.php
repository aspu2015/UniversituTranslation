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
}
