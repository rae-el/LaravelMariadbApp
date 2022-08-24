@extends('layouts.mylayout')
@section('content')
    <!--header-->
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="px-2 py-4 text-gray-700 text-xl">
            <h1>Edit Collector {{$collector->given_name}} {{$collector -> family_name}}</h1>
        </div>
        <!--body-->
        <form action="{{ route('collectors.update', $collector) }}" method="post">
            @method('PUT')
            @csrf
            <div class="pb-4 flex">
                <label for="given_name" class="flex mr-4 w-1/12 w-20">
                    Given Name
                </label>
                <input type="text"
                       id="given_name"
                       name="given_name"
                       class="flex-1"
                       value="{{$collector->given_name}}"
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
                <input type="text" id="family_name" name="family_name" class="flex-1" value="{{$collector->family_name}}"
                       @error('family_name') text-red-500 @enderror
                />
            </div>
            @error('family_name')
            <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
                The family name is required
            </p>
            @enderror
            <label for="cars" class="flex mr-4 w-1/12 w-20">
                Cars
            </label>
            <span class="hidden">{{$count = 1}}</span>
            @forelse($collector->cars as $car)
                {{$count++}}
                <div class="pb-4 flex">
                <input type="text" id="cars{{$count}}" name="cars" class="flex-1" value="{{$car}}"
                           @error('cars') text-red-500 @enderror
                /></div>
                @empty
                    <input type="text" id="cars{{$count}}" name="cars" class="flex-1" value=""
                           @error('cars') text-red-500 @enderror
                    />
                @endforelse
            @error('cars')
            <p class="m-0 p-0 mt-1 ml-32 italic text-red-500">
            </p>
            @enderror
            <div class="pb-4 flex gap-4">
                <span class="py-4 w-1/12 w-20"></span>
                <button type="submit" name="save" class=" rounded py-1 px-1 ml-3 bg-green-200 ">
                    Save
                </button>
                <h3><a href="{{ route('collectors.delete',$collector->id) }}" class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-red-200">
                    Delete
                </a></h3>
                <h3><a href="{{route('collectors.index')}}" class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-blue-200">
                    Cancel
                </a></h3>
            </div>
        </form>
    </div>
@endsection('content')
