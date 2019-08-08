<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Dictionary;
use DB;

class DictionaryController extends Controller
{

    public function __construct() //// Проверка авторизации ////
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lang = Dictionary::allLanguages();
        return view('dictionary.index',[
            'dictionary' => $lang
        ]);
    }

    public function create($id)
    {
        $values = Dictionary::getAllValues($id);
        return view('dictionary.create',[
            'currentLanguage' => $id,
            'wordValues' => $values
        ]);
    }

    public function store(Request $request, $id)
    {
        Dictionary::create([
        'text' => $request->wordTranslation, 
        'language_id' => $id,
        'value_id' => $request->word_id]);
        return redirect("/dictionary/$id/edit");  /// добавление записи в таблицу ///
    }

    public function edit($id)
    {
        $currentLanguage = $id;
        return View('dictionary.edit',[
            'words' => Dictionary::getDictionary($id),
            'currentLagnuage' => $currentLanguage
        ]);
    }

    public function wordEdit($id)
    {
        $word = Dictionary::getCurrentDictionary($id);
        return View('dictionary.wordEdit',[
            'word' => $word
        ]);
    }
    
    public function update(Request $request, $id)
    {   $word = Dictionary::getCurrentDictionary($id);
        $language_id = $word[0]->language_id;
        $value_id = $word[0]->value_id;
        DB::table('dictionary')
            ->where('id', $id)
            ->update([
                'language_id' => $language_id,
                'value_id' => $value_id,
                'text' => $request->get('translation')]);
        return redirect("/dictionary/$language_id/edit");
    }

}
