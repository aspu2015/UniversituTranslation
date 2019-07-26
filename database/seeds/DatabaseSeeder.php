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

        DB::table('languages')->insert([
            'langName'=>'az',
            'picturePath'=>''
        ]);

        DB::table('languages')->insert([
            'langName'=>'tk',
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

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>3,
            'name'=>'Block1',
            'shortDescription' => 'Краткое описание',
            'text'=>
            'Qapalı bir dəst, açıq vəziyyətdə istisna olmaqla, ənənəvi olaraq bir xətt boyunca
             sonsuzluğa gedən bir funksiyanın trigonometrik inteqrasiyasını bərpa edir. 
             Scalar məhsulu dolayı tamamilə konvergent seriyanı dəstəkləyir. Sonlu bir 
             kəsilməyən bir funksiyanın ayrılmazlığı ardıcıl yaxınlaşmanın qeyri-adi metodunu
              layihələndirir. Üstəlik, skaler məhsulu zəruri və kifayətdir. Qapalı bir dəst
               mənasızdır. Konvergent seriya təbii logarifmi əks etdirir.',
            'country' => 'Азербайджан',
            'organization' => 'Бюджетная'
        ]);

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>3,
            'name'=>'Block2',
            'shortDescription' => 'Краткое описание',
            'text'=>
            'Çoxbucaqlı bir çox dəyişənin bir funksiyasının qrafikini tərsinə çevirir. Aksioma
             funksional təhlilini birbaşa dəyişdirir, sonrakı hesablamalar tələbələrə sadə ev
              tapşırığı olaraq qalacaq. Asimptot bir vektor sahəsinin rotoruna imkan verir.
               Ümumiyyətlə, tək funksiya ortogonal determinantı dəstəkləyir.
                Funksiyanın həddinin eksperimental ikiqat inteqral yaratması məntiqli görünür.
                 İnterpolasiya anormal bir determinanta uyğundur.',
            'country' => 'Туркменистан',
            'organization' => 'Бюджетная'
        ]);

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>4,
            'name'=>'Block1',
            'shortDescription' => 'Краткое описание',
            'text'=>
            'Un set închis, excluzând cazul evident, restaurează în mod tradițional 
            integralitatea trigonometrică a unei funcții care merge la infinit de-a lungul
             unei linii, ceea ce nu este surprinzător. Produsul scalar acceptă serii indirecte
              absolut convergente. Integralul unei funcții care are o discontinuitate finită
               proiectează metoda anormală de aproximări succesive. Mai mult decât atât,
                produsul scalar este necesar și suficient. Un set închis este trivial.
                 Seria convergentă reflectă logaritmul natural.',
            'country' => 'Туркменистан',
            'organization' => 'Бюджетная'
        ]);

        DB::table('translations')->insert([
            'university_id'=>99999,
            'language_id'=>4,
            'name'=>'Block2',
            'shortDescription' => 'Краткое описание',
            'text'=>
            '
            Polinomul inversează graficul unei funcții a mai multor variabile.
             Axiomul modifică în mod direct analiza funcțională, iar calculele ulterioare
              vor fi lăsate studenților ca teme de studiu simple. Asymptote permite rotorul
               unui câmp vectorial. În general, funcția ciudată susține un determinant
                ortogonal. Se pare logic ca limita functiei produce un integrala dubla
                 experimentala. Interpolarea corespunde unui determinant anormal.',
            'country' => 'Туркменистан',
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
