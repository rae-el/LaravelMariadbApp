<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Collector;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //gather data needed for home page

        $cars = Car::all();
        $carCount = count($cars);

        $collectors = Collector::all();
        $collectorCount = count($collectors);


        return view('welcome',['carCount'=> $carCount, 'collectorCount' => $collectorCount]);
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


}
