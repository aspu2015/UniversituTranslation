<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Translation;

class TranslationController extends Controller
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
        // dd(Language::all());
        $translationLangs = Language::join('translations', 'languages.id', '=','translations.language_id')
                                      ->where('university_id','=',$id)
                                      ->select('languages.id')
                                      ->get('id')
                                      ->pluck('id');
        $availableLang = Translation::whereNotIn('language_id', $translationLangs)->get();

        dd($availableLang);
        return view('translations.TranslationCreate',[
            'langs' => $availableLang,
            'university_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // dd($request);
        // dd( $request->get('name'););
        $translation = new \App\Translation;
        $translation->university_id = $id;
        $translation->language_id = $request->get('language_id');
        $translation->name = $request->get('universityName');
        $translation->text = $request->get('universityDescription');

        // dd($translation);
        $translation->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $translation = Translation::find($id);
        $langs = Language::langToEdit($id);
        dd($langs);
        return view('translations.TranslationEdit',[
            'translation'=>$translation,
            'langs'=>$langs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
