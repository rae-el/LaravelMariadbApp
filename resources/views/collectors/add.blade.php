@extends('layouts.mylayout')
@section('content')
<!--header-->
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="px-2 py-4 text-gray-700 text-xl">
                    <h1>Add a new collector</h1>
                </div>
                <!--body-->
                <form action="{{route('collectors.store')}}" method="post">
                    @csrf
                    <div class="pb-4 flex">
                        <label for="given_name" class="flex mr-4 w-1/12 w-20">
                            Given Name
                        </label>
                        <input type="text"
                               id="given_name"
                               name="given_name"
                               class="flex-1"
                               @error('given_name') text-red-500 @enderror
                        />
                    </div>
                    @error('given_name')
                    <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                        The given name is required
                    </p>
                    @enderror
                    <div class="pb-4 flex">
                        <label for="family_name" class="flex mr-4 w-1/12 w-20">
                            Family Name
                        </label>
                        <input type="text" id="family_name" name="family_name" class="flex-1"
                               @error('family_name') text-red-500 @enderror
                        />
                    </div>
                    @error('family_name')
                    <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                        The family is required
                    </p>
                    @enderror
                    <div class="pb-4 flex">
                        <label for="cars" class="flex mr-4 w-1/12 w-20">
                            Car
                        </label>
                        <input type="text" id="cars" name="cars" class="flex-1"
                               @error('cars') text-red-500 @enderror
                        />
                    </div>
                    @error('cars')
                    <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                        The car must be input as an array
                    </p>
                    @enderror
                    <div class="pb-4 flex gap-4">
                        <span class="py-4 w-1/12 w-20"></span>
                        <button type="submit" name="save" class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-green-200">
                            Save
                        </button>
                        <button type="submit" name="clear" class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-blue-200">
                            Clear
                        </button>
                        <a href="{{route('collectors.index')}}" class="rounded py-4 w-1/12 w-20 bg-red-200 text-center">
                            Cancel
                        </a>
                    </div>
                </form>
                </div>
@endsection('content')
