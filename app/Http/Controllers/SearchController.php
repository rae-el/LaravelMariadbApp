<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Debugbar;

class SearchController extends Controller
{
    //
    public function search(Request $request){
        Debugbar::info($request);
        $searchValue = $request -> input('query');
        Debugbar::info($searchValue);


        $results = Car::query()
            ->where('manufacturer', 'LIKE', "%{$searchValue}%")
            ->orWhere('code', 'LIKE', "%{$searchValue}%")
            ->get();
        return view('cars.search',compact(['results']));


        /*if ($results == null){
            $cars = Car::all();
            return view('cars.index',compact(['cars']));
        }
        else{
            return view('cars.search',compact(['results']));
        }*/
    }
}
