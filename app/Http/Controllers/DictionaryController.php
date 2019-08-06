<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Dictionary;

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
        $dictionary = Dictionary::getDictionary($id);
        $values = Dictionary::getAllValues($id);
        return view('dictionary.create',[
            'dictionary' => $dictionary,
            'wordValues' => $values
        ]);
    }

    public function store(Request $request, $id)
    {
        $word = new Dictionary;
        $word ->language_id = $id;
        $word ->text = $request->get('wordTranslation');
        $word ->value_id = $request->get('word_id');
        $word ->save();
        return redirect("/dictionary/$id/edit");
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
        $currentWord = $id;
        return View('dictionary.wordEdit',[
            'words' => Dictionary::getDictionary($id),
            'currentLagnuage' => $currentWord
        ]);
    }
    
    // public function update(Request $request, $id)
    // {
    //     $organization = Organization::find($id);
    //     $organization->name = $request->get('name');
    //     $organization->save();
    //     return redirect('/organization');
    // }

}
