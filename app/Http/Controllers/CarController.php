<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;

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
        //need to pull collectors data
        return view("cars.show", compact(['car']));
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
        echo "entered update";
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
