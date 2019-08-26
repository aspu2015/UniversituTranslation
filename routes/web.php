<?php
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api/geodata', 'UniversityController@getGeodata')->name('geodata');
Route::get('/university/info', 'UniversityController@index')->name('UniversityController.index');
Route::get('/api/langs','UniversityController@getLangs')->name('UniversityController.getLangs');

Route::get('/university/create','UniversityController@create')->name('UniversityController.create');
Route::post('/university/store','UniversityController@store')->name('UniversityController.store');
Route::get('/university/{id}/edit', 'UniversityController@edit')->middleware('auth')->name('UniversityControllerEdit');
Route::post('/university/{id}/update', 'UniversityController@update')->middleware('auth')->name('UniversityController.update');
Route::post('/university/{id}/destroy', 'UniversityController@destroy')->middleware('auth')->name('UniversityController.delete');

Route::get('/university/{id}/translation/create', 'TranslationController@create')->middleware('auth')->name('TranslationController.create');
Route::post('/university/{id}/translation/store', 'TranslationController@store')->middleware('auth')->name('TranslationController.store');
Route::get('/translation/{id}/edit', 'TranslationController@edit')->name('TranslationController.edit');
Route::post('/translation/{id}/update', 'TranslationController@update')->name('TranslationController.update');
Route::post('/translation/{id}/destroy', 'TranslationController@destroy')->name('TranslationController.destroy');

Route::get('/lang','LanguageController@index')->name('LanguageController.index');
Route::get('/lang/create', 'LanguageController@create')->name('LanguageController.create');
Route::post('/lang/store', 'LanguageController@store')->name('LanguageController.store');
Route::get('/lang/{id}/edit', 'LanguageController@edit')->name('LanguageController.edit');
Route::post('/lang/{id}/update', 'LanguageController@update')->name('LanguageController.update');
Route::post('/lang/{id}/destroy', 'LanguageController@destroy')->name('LanguageController.destroy');

// Route::resource('/images','ImageController');
Route::get('/images', 'ImageController@index');
Route::get('/images/create', 'ImageController@create');
Route::post('/images/create', 'ImageController@store');



Route::get('/country', 'CountryController@index');
Route::get('/country/create','CountryController@create');
Route::post('/country/store','CountryController@store');
Route::get('/country/{id}/edit','CountryController@edit');
Route::post('/country/{id}/update','CountryController@update');
Route::post('/country/{id}/destroy','CountryController@destroy');

Route::get('/organization', 'OrganizationController@index')->name('LanguageController.index');
Route::get('/organization/create','OrganizationController@create')->name('OrganizationController.create');
Route::post('/organization/store', 'OrganizationController@store')->name('OrganizationController.store');
Route::get('/organization/{id}/edit', 'OrganizationController@edit')->name('LanguageController.edit');
Route::post('/organization/{id}/update', 'OrganizationController@update')->name('OrganizationController.update');
Route::post('/organization/{id}/destroy', 'OrganizationController@destroy')->name('OrganizationController.destroy');

Route::get('/', 'UniversityController@getData')->name('UniversityController.getData'); // Фильтрация меток

Route::get('/universitytable', 'UniversityTableController@index')->name('UniversityTableController.index');
Route::get('/api/tableuniversity', 'UniversityTableController@getData')->name('getData');

Route::get('info_translation/', 'UniversityController@getTranslations');


Route::get('/locality', 'LocalityController@index');
Route::get('/locality/create','LocalityController@create');
Route::post('/locality/store','LocalityController@store');
Route::get('/locality/{id}/edit','LocalityController@edit');
Route::post('/locality/{id}/update','LocalityController@update');
Route::post('/locality/{id}/destroy','LocalityController@destroy');
Route::get('/api/getlocalities', 'LocalityController@getLocalities');

Route::get('/contacts', 'UniversityController@getContacts');

Route::get('/dictionary', 'DictionaryController@index');
Route::get('/dictionary/{id}/edit', 'DictionaryController@edit');
Route::get('/dictionary/{id}/translation/create', 'DictionaryController@create');
Route::get('/dictionary/{id}/word/edit', 'DictionaryController@wordEdit');
Route::post('/dictionary/{id}/translation/store', 'DictionaryController@store');
Route::post('/dictionary/{id}/word/update', 'DictionaryController@update');

Route::get('/news', 'NewsController@index');
Route::get('/news/create','NewsController@create');
Route::post('/news/store','NewsController@store');
Route::get('/news/{id}/edit','NewsController@edit');
Route::post('/news/{id}/update','NewsController@update');
Route::post('/news/{id}/destroy', 'NewsController@destroy');

Route::get('/news/{id}/translation/create', 'NewsTranslationController@create');
Route::post('/newsTranslation/{id}/destroy', 'NewsTranslationController@destroy');
Route::get('/newsTranslation/{id}/edit', 'NewsTranslationController@edit');
Route::post('/newsTranslation/{id}/update', 'NewsTranslationController@update');
Route::post('/news/{id}/translation/store', 'NewsTranslationController@store');

Route::get('/allTheNews','NewsController@showAllTheNews');
