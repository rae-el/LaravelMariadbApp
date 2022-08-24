<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Collector;
use Debugbar;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::all();
        //if wanted to paginate
        //$cars = Car::paginate(#);
        //return view('cars.index',['cars'=> $cars]);
        return view('cars.index',compact(['cars']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        $cars = Car::all();
        return view('cars.add',compact(['cars']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        //validate data in StoreCarRequest
        $newCar =[
            'code' => $request->code,
            'manufacturer' => $request -> manufacturer,
            'model' => $request -> model,
            'price' => $request -> price,
        ];
        Car::create($newCar);

        //tell the user they added a car successfully
        return redirect()->route('cars.index')->with('success','car successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //my relationship is not working so I will do a long way, I know this is not ideal
        $currentCollectors = [];
        $collectors = Collector::all();
        foreach ($collectors as $collector){
            $collectorCars = $collector -> cars;
            foreach ($collectorCars as $collectorCar){
                if ($collectorCar == $car-> code){
                    $collectorName = $collector -> given_name . " " . $collector -> family_name;
                    array_push($currentCollectors,$collectorName);
                }
            }
        }
        return view("cars.show",['car'=>$car, 'currentCollectors'=>$currentCollectors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view("cars.edit", compact(['car']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        Debugbar::addMessage("info","entered update car");
        // validation in StoreCarRequest
        $car -> update([
            'code'=> $request ->code,
            'manufacturer' => $request ->manufacturer,
            'model' => $request ->model,
            'price' => $request ->price,
        ]);

        //tell the user they added a car successfully
        return redirect()->route('cars.index')->with('success','car successfully updated');
    }

    /**
     * Show the resource desired to remove from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function delete(Car $car)
    {
        //
        return view("cars.delete", compact(['car']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
        $car->delete();

        //tell the user they deleted a car successfully
        return redirect()->route('cars.index')->with('success','car successfully deleted');

    }
}
