@extends('layouts.mylayout')
@section('content')
<!--header-->
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <!--body-->
                <table class="table w-full">
                    <thead class=" bg-gray-800 text-gray-100">
                    <tr>
                        <h3 class=" px-2 py-4 bg-gray-800 text-gray-100 text-xl">
                            DELETE {{$car->code}}
                        </h3>
                    </tr>
                    <tr class="columns-2">
                        <th class="col-auto px-4 py-2 text-left">Code</th>
                        <th class="col-auto px-4 py-2">Manufacturer</th>
                        <th class="col-auto px-4 py-2">Model</th>
                        <th class="col-auto px-4 py-2">Price (AUD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="even:bg-gray-100 border-gray-300 border border-bottom border-l-0 border-r-0 hover:bg-neutral-300">
                        <td class="col-auto px-4 py-2">
                            <span class="text-black-500">{{$car->code}}</span>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <span class="text-black-500">{{$car->manufacturer}}</span>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <span class="text-black-500">{{$car->model}}</span>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <span class="text-black-500">${{$car->price}}.00</span>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot class="text-gray-600">
                    <tr>
                        <td class="col-auto px-4 py-2">
                            <h3><a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-blue-200" href="{{ route('cars.index') }}">Cancel</a></h3>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <h3><a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-green-200" href="{{route('cars.edit',$car->id)}}">Edit</a></h3>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <form method="POST" action="{{ route('cars.destroy', $car) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="destroy" class="rounded py-1 px-1 ml-3 bg-red-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
@endsection('content')
