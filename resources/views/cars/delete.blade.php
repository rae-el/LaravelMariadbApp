@extends('layouts.mylayout')
@section('content')
<!--header-->
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1>{{$car->code}}</h1>
                </div>
                <!--body-->
                <table class="table w-full">
                    <thead class=" bg-gray-800 text-gray-100">
                    <tr>
                        <h2>{{ __('Delete Car')}}</h2>
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
                    <tfoot class="bg-gray-800 text-gray-100">
                    <tr>
                        <td class="col-auto px-4 py-2">
                            <h3><a class="ded-btn" href="{{ route('cars.index') }}">Cancel</a></h3>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <form method="POST" action="{{ route('cars.destroy', $car) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="destroy">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
@endsection('content')
