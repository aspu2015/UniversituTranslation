<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsTranslation;

class NewsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $availableLang = NewsTranslation::getAvalibleLangs($id);
        return view('newsTranslation.create',[
            'langs' => $availableLang,
            'news_id' => $id
        ]);
    }

    public function edit($id)
    {
        $translation = NewsTranslation::find($id);
        $avalibleLangs = NewsTranslation::getAvalibleLangs($translation->news_id);
        $selectedLanguage = NewsTranslation::getCurrentLanguage($translation->language_id);
        return view('newsTranslation.edit',[
            'translation'=>$translation,
            'avalibleLangs'=>$avalibleLangs,
            'selectedLang' => $selectedLanguage
        ]);
    }

    public function update(Request $request, $id)
    {
        $translation = NewsTranslation::find($id);
        $translation->language_id = $request->get('language_id');
        $translation->news_title = $request->get('translationTitle');
        $translation->news_text = $request->get('universityDescription'); /// summernote ->
        ////  init.js настроен на переводы университетов (используется id universityDescription)
        $translation->save();
        return redirect("/news/$translation->news_id/edit");
    }

    public function destroy(Request $request, $id){
        $translation = NewsTranslation::find($id);
        $translation->delete();
        return redirect("/news/$translation->news_id/edit");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        NewsTranslation::create([
            'language_id' => $request->get('language_id'), 
            'news_id' => $id,
            'news_title' => $request->get('newsName'),
            'news_text' => $request->get('universityDescription')
        ]);
        return redirect("/news/$id/edit");
    }

}
