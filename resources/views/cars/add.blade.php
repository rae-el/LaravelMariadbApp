@extends('layouts.mylayout')
@section('content')
<!--header-->
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1>Add a Car</h1>
                </div>
                <!--body-->
                <form action="" method="post">
                    @csrf
                    <div class="pb-4 flex">
                        <label for="code" class="flex mr-4 w-1/12 w-20">
                            Code
                        </label>
                        <input type="text" id="code" name="code" class="flex-1"/>
                    </div>
                    <div class="pb-4 flex">
                        <label for="manufacturer" class="flex mr-4 w-1/12 w-20">
                            Manufacturer
                        </label>
                        <input type="text" id="manufacturer" name="manufacturer" class="flex-1"/>
                    </div>
                    <div class="pb-4 flex">
                        <label for="model" class="flex mr-4 w-1/12 w-20">
                            Model
                        </label>
                        <input type="text" id="model" name="model" class="flex-1"/>
                    </div>
                    <div class="pb-4 flex">
                        <label for="price" class="flex mr-4 w-1/12 w-20">
                            Price
                        </label>
                        <input type="text" id="price" name="price" class="flex-1"/>
                    </div>
                    <div class="pb-4 flex gap-4">
                        <span class="py-4 w-1/12 w-20"></span>
                        <button class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-green-200">
                            Save
                        </button>
                        <button class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-blue-200">
                            Clear
                        </button>
                        <a href="{{route('cars.index')}}" class="rounded py-4 w-1/12 w-20 bg-red-200 text-center">
                            Cancel
                        </a>
                    </div>
                </form>
                </div>
@endsection('content')
