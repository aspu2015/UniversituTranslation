<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Carbon\Carbon;
use App\InfoTranslation;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   $allNews = News::getAllNews();
        return view('news.index', [
            'news' => $allNews
        ]);
    }

    public function create(){
        
        return view('news.create');
    }

    public function store(Request $request){
        $Nowtime = Carbon::now();
        News::create([
            'title' => $request->title, 
            'publicDate' => $Nowtime,
            'published' => 2
        ]);
        return redirect('/news');
    }

    public function edit($id){
        $currentNews = News::find($id);
        $translations = News::getAllTranslations($id);
        return View('news.edit',[
            'currentNews' => $currentNews,
            'translations' => $translations
        ]);
    }

    public function update(Request $request, $id){
        $currentNews = News::find($id);
        $currentNews->published = $request->get('isPublished');
        $currentNews->title = $request->get('title');
        $currentNews->publicDate = $currentNews->publicDate;
        $currentNews->save();
        return redirect('/news');
    }

    public function destroy(Request $request, $id){
        News::find($id)->delete();
        return redirect('/news');
    }
    
}

