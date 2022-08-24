<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectorRequest;
use App\Http\Requests\UpdateCollectorRequest;
use App\Models\Collector;
use Illuminate\Http\Request;
use Debugbar;


class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $collectors = Collector::all();
        foreach ($collectors as $collector){
            $cars = $collector -> cars;
        }
            return view('collectors.index',compact(['collectors','cars']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        $collectors = collector::all();
        return view('collectors.add',compact(['collectors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCollectorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollectorRequest $request)
    {
        //
        //validate data in StoreCollectorRequest
        $newCollector =[
            'given_name' => $request->given_name,
            'family_name' => $request -> family_name,
            'cars' => $request -> cars,
        ];
        Collector::create($newCollector);

        //tell the user they added a car successfully
        return redirect()->route('collectors.index')->with('success','collector successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function show(Collector $collector)
    {
        //
        return view("collectors.show",compact(['collector']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function edit(Collector $collector)
    {
        //
        return view("collectors.edit", compact(['collector']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollectorRequest  $request
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectorRequest $request, Collector $collector)
    {
        //
        Debugbar::addMessage("info","entered update collector");
        // validation in StoreCarRequest
        $collector -> update([
            'given_name' => $request->given_name,
            'family_name' => $request -> family_name,
            'cars' => $request -> cars,
        ]);

        //tell the user they added a collector successfully
        return redirect()->route('collectors.index')->with('success','collector successfully updated');
    }
    /**
     * Show the resource desired to remove from storage.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function delete(Collector $collector)
    {
        //
        return view("collectors.delete", compact(['collector']));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collector  $collector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collector $collector)
    {
        //
        $collector -> delete();
        return redirect()->route('collectors.index')->with('success','collector successfully deleted');

    }
    public function search(Request $request){
        Debugbar::info($request);
        $searchValue = $request -> input('query');
        Debugbar::info($searchValue);


        $results = Collector::query()
            ->where('given_name', 'LIKE', "%{$searchValue}%")
            ->orWhere('family_name', 'LIKE', "%{$searchValue}%")
            ->get();
        return view('collectors.search',compact(['results']));


    }
}
