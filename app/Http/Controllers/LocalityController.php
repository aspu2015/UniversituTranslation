<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Locality;
use App\Country;
use PHPUnit\Framework\Constraint\Count;

class LocalityController extends Controller
{
    public function __construct() //// Проверка авторизации ////
    {
        $this->middleware('auth');
    }


    public function index(){
        return View('locality.index',[
            'localities' => Locality::get()
        ]);
    }

    public function edit($id){
        return View('locality.edit',[
            'locality' => Locality::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $locality = Locality::find($id);
        $locality->name = $request->get('name');
        $locality->save();
        return redirect('/locality');
    }

    public function create(){
        $country = Country::all();
        return view('locality.create',[
            'country' => $country
        ]);
    }

    public function store(Request $request){
        $locality = new Locality;
        $locality->name = $request;
        $locality->country_id = $request->get('country_id');
        $locality->save();
        return redirect('/locality');
    }

    public function destroy(Request $request, $id){
        Locality::find($id)->destroy();
        return redirect('/locality');
    }
}
