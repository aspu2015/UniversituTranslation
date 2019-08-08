<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'name'=>'Бюджетная'
        ]);

        DB::table('organizations')->insert([
            'name'=>'Коммерческая'
        ]);

        DB::table('countries')->insert([
            'name'=>'Россия'
        ]);

        DB::table('countries')->insert([
            'name'=>'Азербайджан'
        ]);

        DB::table('countries')->insert([
            'name'=>'Иран'
        ]);
        
        DB::table('countries')->insert([
            'name'=>'Казахстан'
        ]);    

        DB::table('countries')->insert([
            'name'=>'Туркменистан'
        ]);
        // $this->call(UsersTableSeeder::class);

        DB::table('languages')->insert([
            'langName'=>'Русский',
            'picturePath'=>'/images/1564554070.png',
            'priority'=>'1',
            'langCode'=>'ru'
        ]);

        DB::table('languages')->insert([
            'langName'=>'English',
            'picturePath'=>'',
            'priority'=>'2',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'中文 (Chinese)',
            'picturePath'=>'',
            'priority'=>'2',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'اللغة العربية (Arabic)',
            'picturePath'=>'',
            'priority'=>'2',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'Français (French)',
            'picturePath'=>'',
            'priority'=>'2',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'Español (Spanish)',
            'picturePath'=>'',
            'priority'=>'2',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'Azərbaycan dili',
            'picturePath'=>'/images/1564554082.png',
            'priority'=>'1',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'زبان فارسی',
            'picturePath'=>'/images/1564554096.png',
            'priority'=>'1',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'Казақша',
            'picturePath'=>'/images/1564554102.png',
            'priority'=>'1',
            'langCode'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'Türkmen dili',
            'picturePath'=>'/images/1564554090.png',
            'priority'=>'1',
            'langCode'=>''
        ]);


        DB::table('localities')->insert([
            'country_id'=>'1',
            'name'=>'Астрахань'
        ]);

        DB::table('localities')->insert([
            'country_id'=>'2',
            'name'=>'Азербайджан'
        ]);

        
        DB::table('universities')->insert([
            'name' => 'ASU',
            'description' => 'ASU - Astrakhan State University',
            'country_id'=>'1',
            'organization_id'=>'1',
            'locality_id'=>'1',
            'geolocationX'=>46.5361,
            'geolocationY'=>48.0574
        ]);

        DB::table('universities')->insert([
            'name' => 'ASU3',
            'description' => 'BSU1 - Baku State University',
            'country_id'=>'2',
            'organization_id'=>'1',
            'locality_id'=>'2',
            'geolocationX'=>46.5362,
            'geolocationY'=>48.0575
        ]);

        DB::table('universities')->insert([
            'name' => 'ASU2',
            'description' => 'ASU2 - Astrakhan State University2',
            'country_id'=>'1',
            'organization_id'=>'1',
            'locality_id'=>'1',
            'geolocationX'=>46.5340,
            'geolocationY'=>48.0543
        ]);

        DB::table('universities')->insert([
            'name' => 'ASU1',
            'description' => 'ASU1 - Astrakhan State University1',
            'country_id'=>'1',
            'organization_id'=>'1',
            'locality_id'=>'1',
            'geolocationX'=>46.5374,
            'geolocationY'=>48.0587
        ]);

        DB::table('universities')->insert([
            'name' => 'BSU',
            'description' => 'BSU - Baku State University',
            'country_id'=>'3',
            'organization_id'=>'1',
            'locality_id'=>'1',
            'geolocationX'=>40.369263,
            'geolocationY'=>49.830689
        ]);

        DB::table('universities')->insert([
            'name' => 'SSU',
            'description' => 'SSU - Serdar State University',
            'country_id'=>'2',
            'organization_id'=>'1',
            'locality_id'=>'1',
            'geolocationX'=>37.935183,
            'geolocationY'=>58.378977
        ]);

        DB::table('universities')->insert([
            'name' => 'ASTU',
            'description' => 'ASTU - Astrakhan',
            'country_id'=>'1',
            'organization_id'=>'1',
            'locality_id'=>'1',
            'geolocationX'=>46.5361,
            'geolocationY'=>48.0574
        ]);

        DB::table('universities')->insert([
            'name' => 'T',
            'description' => 'T - university description',
            'country_id'=>'4',
            'organization_id'=>'1',
            'locality_id'=>'1',
            'geolocationX'=>35.661703,
            'geolocationY'=>51.367734
        ]);
         

        DB::table('translations')->insert([
            'university_id'=>1,
            'language_id'=>2,
            'name'=>'Astrakhan State University',
            'shortDescription' => 'short description',
            'text'=>'ASU - one of the best universities',
            'country' => 'Russia',
            'organization' => 'Budgetary',
            'locality' => 'Astrakhan',
            'site_URL' => 'http://asu.edu.ru/'
        ]);

        DB::table('translations')->insert([
            'university_id'=>1,
            'language_id'=>1,
            'name'=>'Астраханский государственный университет',
            'shortDescription' => 'Краткое описание',
            'text'=>'АГУ- один из лучших университетов в Астрахани',
            'country' => 'Россия',
            'organization' => 'Бюджетная',
            'locality' => 'Астрахань',
            'site_URL' => 'http://asu.edu.ru/'
        ]);

        DB::table('translations')->insert([
            'university_id'=>2,
            'language_id'=>2,
            'name'=>'Baku State University',
            'shortDescription' => 'short description',
            'text'=>'university description',
            'country' => 'Azerbaijan',
            'organization' => 'Commercial',
            'locality' => 'Baku',
            'site_URL' => 'http://bsu.edu.az/'
        ]);

        DB::table('translations')->insert([
            'university_id'=>2,
            'language_id'=>1,
            'name'=>'Бакинский госудаственный университет',
            'shortDescription' => 'Краткое описание',
            'text'=>'описание университета',
            'country' => 'Азербайджан',
            'organization' => 'Коммерческая',
            'locality' => 'Baku',
            'site_URL' => 'http://bsu.edu.az/'
        ]);

        

        DB::table('info_category')->insert([
            'name'=>'Главная'
        ]);

        DB::table('info_sections')->insert([
            'category_id' => 1,
            'name'=>'ИнфоБлок1'
        ]);

        DB::table('info_sections')->insert([
            'category_id' => 1,
            'name'=>'ИнфоБлок2'
        ]);
        
        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>1,
            'section_id'=>1,
            'text'=>'summertime sadness ss su summertime'
        ]);

        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>1,
            'section_id'=>2,
            'text'=>'Sooooomebody ...'
        ]);

        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>2,
            'section_id'=>1,
            'text'=>''
        ]);

        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>2,
            'section_id'=>2,
            'text'=>'САААААМБАДИ ванс толд миии'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Type of organization',
            'value_id'=>1
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Country',
            'value_id'=>2
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Тип организации',
            'value_id'=>1
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Страна',
            'value_id'=>2
            
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Другой язык',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>3,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>4,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>5,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>6,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>7,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>8,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>9,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>10,
            'text'=>'Language',
            'value_id'=>3
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Все организации',
            'value_id'=>4
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'All the organizations',
            'value_id'=>4
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Населенный пункт',
            'value_id'=>5
        ]);
        
        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Locality',
            'value_id'=>5
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Выберите язык',
            'value_id'=>6
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Choose language',
            'value_id'=>6
        ]);
        
        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'<p>Мультиязычный сайт для поддержки единого</p>
            научно-образовательного пространства Каспийского региона',
            'value_id'=>7
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'<p>Multilingual site to support a single</p>
            scientific and educational space of the Caspian region',
            'value_id'=>7
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Для выбора группы организаций используйте фильтры',
            'value_id'=>8
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Use filters to select a group of organizations',
            'value_id'=>8
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Выбрать',
            'value_id'=>9
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Choose',
            'value_id'=>9
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Контактная информация',
            'value_id'=>10
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Contact Information',
            'value_id'=>10
        ]);
        
        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Объявления',
            'value_id'=>11
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'News',
            'value_id'=>11
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'© Copyright 2019 Астраханский государственный университет',
            'value_id'=>12
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'© Copyright 2019 Astrakhan State University',
            'value_id'=>12
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Адрес сайта',
            'value_id'=>13
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Web address',
            'value_id'=>13
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Название',
            'value_id'=>14
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Name',
            'value_id'=>14
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Фильтры',
            'value_id'=>15
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Filters',
            'value_id'=>15
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Организации',
            'value_id'=>16
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Organizations',
            'value_id'=>16
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'text'=>'Главная',
            'value_id'=>17
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'text'=>'Main',
            'value_id'=>17
        ]);
        
        DB::table('dictionary_values')->insert([
            'value'=>'Тип организации',
            'tagName'=>'orgType'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Страна',
            'tagName'=>'countryName'

        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Другой язык',
            'tagName'=>'chooseLang'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Все организации',
            'tagName'=>'allOrganizations'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Населенный пункт',
            'tagName'=>'localityName'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Выберите язык',
            'tagName'=>'ChooseLangSpan'
        ]);
        
        DB::table('dictionary_values')->insert([
            'value'=>'<p>Мультиязычный сайт для поддержки единого</p>
            научно-образовательного пространства Каспийского региона',
            'tagName'=>'titleSite'
        ]);
        
        DB::table('dictionary_values')->insert([
            'value'=>'Для выбора группы организаций используйте фильтры',
            'tagName'=>'hint'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Выбрать',
            'tagName'=>'applyFilters'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Контактная информация',
            'tagName'=>'contactInfo'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Объявления',
            'tagName'=>'newsTitle'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'© Copyright 2019 Астраханский государственный университет',
            'tagName'=>'copyright'
        ]);
        
        DB::table('dictionary_values')->insert([
            'value'=>'Адрес сайта',
            'tagName'=>'SiteURL'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Название',
            'tagName'=>'orgName'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Фильтры',
            'tagName'=>'filtersName'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Организации',
            'tagName'=>'tableTitle'
        ]);

        DB::table('dictionary_values')->insert([
            'value'=>'Главная',
            'tagName'=>'linkMain'
        ]);


        date_default_timezone_set('Europe/Astrakhan');
        $mytime = Carbon\Carbon::now();

        DB::table('news')->insert([
            'title'=>'Новость №1',
            'publicDate'=>$mytime,
            'published' => 1 
        ]);

        DB::table('news')->insert([
            'title'=>'Новость №2',
            'publicDate'=>$mytime,
            'published' => 2 
        ]);

        DB::table('news_translation')->insert([
            'language_id'=> 2,
            'news_id'=> 1,
            'news_title' => 'Title for news1',
            'news_text' => 'Text news 1 '
        ]);
        
    }
}
