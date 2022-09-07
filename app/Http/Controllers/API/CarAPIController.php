<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;

class CarAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $cars = Car::all();
        //if wanted to paginate
        //$cars = Car::paginate(#);
        //return view('cars.index',['cars'=> $cars]);
        return response()->json($cars);

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function add()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreCarRequest $request)
    {
        //validate data in StoreCarRequest
        $car = new Car;
        $car->code = $request->code;
        $car->manufacturer = $request->manufacturer;
        $car->model = $request->model;
        $car->price = $request->price;
        $car->save();

        return response()->json([
            "message" => "Car Added"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     */
    public function show(Car $car)
    {
        if (!empty($car)) {
            return response()->json($car);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCarRequest $request
     * @param \App\Models\Car $car
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $id = $car->id;
        // validation in StoreCarRequest
        if (Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car->code = is_null($request->code) ? $car->name : $request->name;
            $car->manufacturer = is_null($request->manufacturer) ? $car->manufacturer : $request->manufacturer;
            $car->model = is_null($request->model) ? $car->model : $request->model;
            $car->price = is_null($request->price) ? $car->price : $request->price;
            $car -> save();
            return response()->json([
                "message" => "Car updated"
            ],204);
        }else{
            return response()->json([
                "message" => "Car not found"
            ],404);
        }

    }

    /**
     * Show the resource desired to remove from storage.
     *
     * @param \App\Models\Car $car
     */
    public function delete(Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     */
    public function destroy(Car $car)
    {
        //
        $id = $car->id;
        // validation in StoreCarRequest
        if (Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car -> delete();
            return response()->json([
                "message"=>"records deleted"
            ],202);
        }else{
            return response()->json([
                "message"=>"car not found"
            ],404);
        }

    }
}
