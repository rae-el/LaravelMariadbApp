@extends('layouts.mylayout')
@section('content')
    <!--header-->
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="px-2 py-4 text-gray-700 text-xl">
            <h1>Edit {{$car->code}}</h1>
        </div>
        <!--body-->
        <form action="{{ route('cars.update', $car) }}" method="post">
            @method('PUT')
            @csrf
            <div class="pb-4 flex">
                <label for="code" class="flex mr-4 w-1/12 w-20">
                    Code
                </label>
                <input type="text"
                       id="code"
                       name="code"
                       class="flex-1 rounded"
                       value="{{$car->code}}"
                       @error('code') text-red-500 @enderror
                />
            </div>
            @error('code')
            <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                The code is required
            </p>
            @enderror
            <div class="pb-4 flex">
                <label for="manufacturer" class="flex mr-4 w-1/12 w-20">
                    Manufacturer
                </label>
                <input type="text" id="manufacturer" name="manufacturer" class="flex-1 rounded"
                       value="{{$car->manufacturer}}"
                       @error('manufacturer') text-red-500 @enderror
                />
            </div>
            @error('manufacturer')
            <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                The manufacturer is required
            </p>
            @enderror
            <div class="pb-4 flex">
                <label for="model" class="flex mr-4 w-1/12 w-20">
                    Model
                </label>
                <input type="text" id="model" name="model" class="flex-1 rounded"
                       value="{{$car->model}}"
                       @error('model') text-red-500 @enderror
                />
            </div>
            @error('model')
            <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                The model is required
            </p>
            @enderror
            <div class="pb-4 flex">
                <label for="price" class="flex mr-4 w-1/12 w-20">
                    Price
                </label>
                <input type="number" id="price" name="price" class="flex-1 rounded"
                       value="{{$car->price}}"
                       @error('price') text-red-500 @enderror
                />
            </div>
            @error('price')
            <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                The price must be a number
            </p>
            @enderror
            <div class="pb-4 flex gap-4">
                <span class="py-4 w-1/12 w-20"></span>
                <button type="submit" name="save" class=" rounded py-1 px-1 ml-3 bg-green-200 ">
                    Save
                </button>
                <h3><a href="{{ route('cars.delete',$car->id) }}" class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-red-200">
                    Delete
                </a></h3>
                <h3><a href="{{route('cars.index')}}" class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-blue-200">
                    Cancel
                </a></h3>
            </div>
        </form>
    </div>
@endsection('content')
