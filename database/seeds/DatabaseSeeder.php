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
            'geolocationX'=>46.377899,
            'geolocationY'=>48.052897
        ]);

        DB::table('universities')->insert([
            'name' => 'BSU',
            'description' => 'BSU - Baku State University',
            'country_id'=>'3',
            'organization_id'=>'1',
            'geolocationX'=>40.369263,
            'geolocationY'=>49.830689
        ]);

        DB::table('universities')->insert([
            'name' => 'SSU',
            'description' => 'SSU - Serdar State University',
            'country_id'=>'2',
            'organization_id'=>'1',
            'geolocationX'=>38.970695,
            'geolocationY'=>56.246467
        ]);

        DB::table('translations')->insert([
            'university_id'=>1,
            'language_id'=>1,
            'name'=>'ASU',
            'shortDescription' => 'short description',
            'text'=>'ASU - one of the best universities',
            'country' => 'Russia',
            'organization' => 'Budgetary'
        ]);

        DB::table('translations')->insert([
            'university_id'=>1,
            'language_id'=>2,
            'name'=>'АГУ',
            'shortDescription' => 'Краткое описание',
            'text'=>'АГУ- один из лучших университетов в Астрахани',
            'country' => 'Россия',
            'organization' => 'Бюджетная'
        ]);

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>1,
            'name'=>'Block1',
            'shortDescription' => 'Краткое описание',
            'text'=>
            'The trailing set, which excludes the obvious case, traditionally restores trigonometric
             integration from functions that go to infinity along lines, which is not surprising.
              Scalar product supports indirect absolutely convergent series. Integral functions,
               the presence of a finite discontinuity projects an abnormal method of successive
                approximations. Moreover, the scalar product is necessary and sufficient.
                 A closed set is trivial. The convergent series contains the natural logarithm.',
            'country' => 'Россия',
            'organization' => 'Бюджетная'
        ]);

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>2,
            'name'=>'Block1',
            'shortDescription' => 'Краткое описание',
            'text'=>
            'Замкнутое множество, исключая очевидный случай, традиционно восстанавливает
             тригонометрический интеграл от функции, обращающейся в бесконечность вдоль линии,
              что неудивительно. Скалярное произведение поддерживает косвенный абсолютно сходящийся ряд.
               Интеграл от функции, имеющий конечный разрыв проецирует анормальный метод
                последовательных приближений. Более того, скалярное произведение необходимо и достаточно.
                 Замкнутое множество тривиально. Сходящийся ряд отражает натуральный логарифм.',
            'country' => 'Россия',
            'organization' => 'Бюджетная'
        ]);

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>1,
            'name'=>'Block2',
            'shortDescription' => 'Краткое описание',
            'text'=>
            'The polynomial reverses the graph of a function of many variables.
             The axiom directly changes the functional analysis; further calculations will
              be left to students as simple homework. Asymptote allows the rotor of a vector field.
               In general, the odd function supports an orthogonal determinant.
                It seems logical that the limit of the function produces an 
                experimental double integral. Interpolation corresponds to an abnormal determinant.',
            'country' => 'Россия',
            'organization' => 'Бюджетная'
        ]);

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>2,
            'name'=>'Block2',
            'shortDescription' => 'Краткое описание',
            'text'=>
            'Полином переворачивает график функции многих переменных. Аксиома непосредственно изменяет
            функциональный анализ, дальнейшие выкладки оставим студентам в качестве несложной
             домашней работы. Асимптота допускает ротор векторного поля. В общем, нечетная функция
              поддерживает ортогональный определитель. Представляется логичным, что предел функции
               продуцирует экспериментальный двойной интеграл. Интерполяция соответствует
                анормальный детерминант.',
            'country' => 'Россия',
            'organization' => 'Бюджетная'
        ]);

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
            'name'=>'Туркменистан'
        ]);

        DB::table('countries')->insert([
            'name'=>'Азербайджан'
        ]);

        DB::table('info_category')->insert([
            'name'=>'Главная'
        ]);

        DB::table('info_sections')->insert([
            'category_id' => '1',
            'name'=>'ИнфоБлок1'
        ]);

        DB::table('info_sections')->insert([
            'category_id' => '1',
            'name'=>'ИнфоБлок2'
        ]);
        
        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>1,
            'section_id'=>'1',
            'text'=>'summertime sadness ss su summertime'
        ]);

        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>1,
            'section_id'=>'2',
            'text'=>'Sooooomebody ...'
        ]);

        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>2,
            'section_id'=>'1',
            'text'=>'летняя печаааааааль'
        ]);

        DB::table('info_translation')->insert([
            'category_id'=>1,
            'language_id'=>2,
            'section_id'=>'2',
            'text'=>'САААААМБАДИ ванс толд миии'
        ]);
    }
}
