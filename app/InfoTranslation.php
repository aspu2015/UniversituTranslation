<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class InfoTranslation extends Model
{
    public static function getCategories()
    {
        return DB::select('select * from info_category');
    }

    public static function getSections($id)
    {
        return DB::select('select info_sections.name, info_sections.id 
        from info_category, info_sections 
        where info_sections.category_id = info_category.id  
        and info_category.id = ?', [$id]);
               //where('age', '>', 200);
        
    }

    public static function getTranslation()
    {
        return DB::select('select info_translation.*, languages.langName,
         languages.picturePath 
         from info_translation, languages
         where languages.id = info_translation.language_id');
    }
    
}
