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
            'priority'=>'1'
        ]);

        DB::table('languages')->insert([
            'langName'=>'English',
            'picturePath'=>'',
            'priority'=>'2'
        ]);

        DB::table('languages')->insert([
            'langName'=>'中文 (Chinese)',
            'picturePath'=>'',
            'priority'=>'2'
        ]);

        DB::table('languages')->insert([
            'langName'=>'اللغة العربية (Arabic)',
            'picturePath'=>'',
            'priority'=>'2'
        ]);

        DB::table('languages')->insert([
            'langName'=>'Français (French)',
            'picturePath'=>'',
            'priority'=>'2'
        ]);

        DB::table('languages')->insert([
            'langName'=>'Español (Spanish)',
            'picturePath'=>'',
            'priority'=>2
        ]);

        DB::table('languages')->insert([
            'langName'=>'Azərbaycan dili',
            'picturePath'=>'/images/1564554082.png',
            'priority'=>'1'
        ]);

        DB::table('languages')->insert([
            'langName'=>'زبان فارسی',
            'picturePath'=>'/images/1564554096.png',
            'priority'=>'1'
        ]);

        DB::table('languages')->insert([
            'langName'=>'Казақша',
            'picturePath'=>'/images/1564554102.png',
            'priority'=>'1'
        ]);

        DB::table('languages')->insert([
            'langName'=>'Türkmen dili',
            'picturePath'=>'/images/1564554090.png',
            'priority'=>'1'
        ]);


        

        DB::table('localities')->insert([
            'country_id'=>'1',
            'name'=>'Астрахань'
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
            'description' => 'ASU3 - Astrakhan State University3',
            'country_id'=>'1',
            'organization_id'=>'1',
            'locality_id'=>'1',
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
            'text'=>'летняя печаааааааль'
        ]);

        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>2,
            'section_id'=>2,
            'text'=>'САААААМБАДИ ванс толд миии'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'orgType',
            'text'=>'Type of organization'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'countryName',
            'text'=>'Country'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'orgType',
            'text'=>'Тип организации'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'countryName',
            'text'=>'Страна'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'chooseLang',
            'text'=>'Другой язык'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>3,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>4,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>5,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>6,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>7,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>8,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>9,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>10,
            'name'=>'chooseLang',
            'text'=>'Language'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'allOrganizations',
            'text'=>'Все организации'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'allOrganizations',
            'text'=>'All the organizations'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'localityName',
            'text'=>'Населенные пункты'
        ]);
        
        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'localityName',
            'text'=>'Localities'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'ChooseLangSpan',
            'text'=>'Выберите язык'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'ChooseLangSpan',
            'text'=>'Choose language'
        ]);
        
        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'titleSite',
            'text'=>'<p>Мультиязычный сайт для поддержки единого</p>
            научно-образовательного пространства Каспийского региона'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'titleSite',
            'text'=>'<p>Multilingual site to support a single</p>
            scientific and educational space of the Caspian region'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'hint',
            'text'=>'Для выбора группы организаций используйте фильтры'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'hint',
            'text'=>'Use filters to select a group of organizations'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'applyFilters',
            'text'=>'Выбрать'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'applyFilters',
            'text'=>'Choose'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'contactInfo',
            'text'=>'Контактная информация'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'contactInfo',
            'text'=>'Contact Information'
        ]);
        
        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'newsTitle',
            'text'=>'Объявления'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'newsTitle',
            'text'=>'News'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'copyright',
            'text'=>'© Copyright 2019 Астраханский государственный университет'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'copyright',
            'text'=>'© Copyright 2019 Astrakhan State University'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'SiteURL',
            'text'=>'Адрес сайта'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'SiteURL',
            'text'=>'Web address'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'orgName',
            'text'=>'Название'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'orgName',
            'text'=>'Name'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'filtersName',
            'text'=>'Фильтры'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'filtersName',
            'text'=>'Filters'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'tableTitle',
            'text'=>'Организации'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'tableTitle',
            'text'=>'Organizations'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>1,
            'name'=>'linkMain',
            'text'=>'Главная'
        ]);

        DB::table('dictionary')->insert([
            'language_id'=>2,
            'name'=>'linkMain',
            'text'=>'Main'
        ]);
        
        

    }
}
