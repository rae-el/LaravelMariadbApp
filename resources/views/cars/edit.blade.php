@extends('layouts.mylayout')
@section('content')
    <!--header-->
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
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
                <span>:      </span>
                <input type="text"
                       id="code"
                       name="code"
                       class="flex-1"
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
                <span>:      </span>
                <input type="text" id="manufacturer" name="manufacturer" class="flex-1"
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
                <span>:      </span>
                <input type="text" id="model" name="model" class="flex-1"
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
                <span>:      </span>
                <input type="number" id="price" name="price" class="flex-1"
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
                <h3><button type="submit" name="save" class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-green-200">
                    Save
                </button></h3>
                <h3><a href="{{ route('cars.delete',$car->id) }}" class="rounded py-4 w-1/12 w-20 bg-red-200 text-center">
                    Delete
                </a></h3>
                <h3><a href="{{route('cars.index')}}" class="rounded py-4 w-1/12 w-20 bg-red-200 text-center">
                    Cancel
                </a></h3>
            </div>
        </form>
    </div>
@endsection('content')
