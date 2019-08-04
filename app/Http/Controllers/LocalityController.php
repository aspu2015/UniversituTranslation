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
        $currentLocality = Locality::find($id);
        $selectedCountry = Country::find($currentLocality->country_id);
        $avalibleCountries = Country::where('id','<>',$currentLocality->country_id )->get();
        return View('locality.edit',[
            'locality' => Locality::find($id),
            'country' => $avalibleCountries,
            'currentCountry' => $selectedCountry
        ]);
    }

    public function update(Request $request, $id){
        $locality = Locality::find($id);
        $locality->name = $request->get('name');
        $locality->country_id = $request->get('country_id');
        $locality->save();
        return redirect('/locality');
    }

    public function create(){
        $locality = Locality::all();
        $country = Country::all();
        return view('locality.create',[
            'locality' => $locality,
            'country' => $country
        ]);
    }

    public function store(Request $request){
        $locality = new Locality;
        $locality->name = $request->get('name');
        $locality->country_id = $request->get('country_id');
        $locality->save();
        return redirect('/locality');
    }

    public function destroy(Request $request, $id){
        Locality::find($id)->delete();
        return redirect('/locality');
    }

    // public function getLocalities(){
    //     $all = Locality::getAllLocalities();
    //     return json_encode($all);
    // }


}
