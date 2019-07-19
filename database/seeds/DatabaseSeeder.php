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
        // $this->call(UsersTableSeeder::class);
        DB::table('languages')->insert([
            'langName'=>'en',
            'picturePath'=>''
        ]);
        DB::table('languages')->insert([
            'langName'=>'ru',
            'picturePath'=>''
        ]);
        //55.831903, 37.411961
        DB::table('universities')->insert([
            'name' => 'ASU',
            'description' => 'ASU - Astrakhan State University',
            'country_id'=>'1',
            'organization_id'=>'1',
            'geolocationX'=>55.831903,
            'geolocationY'=>37.411961
        ]);

        DB::table('translations')->insert([
            'university_id'=>1,
            'language_id'=>1,
            'name'=>'ASU',
            'text'=>'ASU - one of the best universities'
        ]);

        DB::table('translations')->insert([
            'university_id'=>1,
            'language_id'=>2,
            'name'=>'АГУ',
            'text'=>'АГУ- один из лучших университетов в Астрахани'
        ]);
        DB::table('organizations')->insert([
            'name'=>'Бюджетная',
        ]);
        DB::table('organizations')->insert([
            'name'=>'Коммерческая',
        ]);
        DB::table('countries')->insert([
            'name'=>'Россия',
        ]);
        DB::table('countries')->insert([
            'name'=>'Франция',
        ]);

        DB::table('info_category')->insert([
            'name'=>'main'
        ]);
    }
}
