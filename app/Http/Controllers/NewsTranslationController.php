<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsTranslation;
use Illuminate\Support\Facades\Auth;


class NewsTranslationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   $allNews = NewsTranslation::getAllNews();
        return view('news.index', [
            'news' => $allNews
        ]);
    }

    public function create(){
        
        return view('news.create');
    }

    public function store(Request $request){
        $Nowtime = Carbon::now();
        NewsTranslation::create([
            'title' => $request->title, 
            'publicDate' => $Nowtime,
            'published' => 2
        ]);
        return redirect('/news');
    }

    public function edit($id){
        $currentNews = NewsTranslation::find($id);
        return View('news.edit',[
            'currentNews' => $currentNews
        ]);
    }

    public function update(Request $request, $id){
        $currentNews = NewsTranslation::find($id);
        $currentNews->published = $request->get('isPublished');
        $currentNews->title = $request->get('title');
        $currentNews->publicDate = $currentNews->publicDate;
        $currentNews->save();
        return redirect('/news');
    }

    public function destroy(Request $request, $id){
        NewsTranslation::find($id)->delete();
        return redirect('/news');
    }
    
}

