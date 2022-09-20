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
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        //
        $cars = Car::all();
        //return response()->json($cars);
        return response('RETURNED: '.$cars,200);

    }


    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(StoreCarRequest $request)
    {
        //validate data in StoreCarRequest
        /*
        $car = new Car;
        $car->code = $request->code;
        $car->manufacturer = $request->manufacturer;
        $car->model = $request->model;
        $car->price = $request->price;
        $car->save();
        return response()->json([
            "message" => "Car Added"
        ], 201);*/
        $car = new Car;
        $car->code = $request->code;
        $car->manufacturer = $request->manufacturer;
        $car->model = $request->model;
        $car->price = $request->price;

        $car = Car::create($car);
        return response('Added: '.$car,201);


    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $car = Car::find($id);
        if (!empty($car)) {
            return response()->json($car);
        } else {
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCarRequest $request
     */
    public function update(UpdateCarRequest $request, $id)
    {
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
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     */
    public function destroy($id)
    {
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
