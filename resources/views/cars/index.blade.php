@extends('layouts.mylayout')
@section('content')
<!--header-->
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1>Cars</h1>
                </div>
                <!--body-->
                <table class="table w-full">
                    <thead class=" bg-gray-800 text-gray-100">
                    <tr class="columns-2">
                        <th class="col-auto px-4 py-2 text-left">Code</th>
                        <th class="col-auto px-4 py-2">Manufacturer</th>
                        <th class="col-auto px-4 py-2">Model</th>
                        <th class="col-auto px-4 py-2">Price (AUD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cars as $car)
                        <tr class="even:bg-gray-100 border-gray-300 border border-bottom border-l-0 border-r-0 hover:bg-neutral-300">
                            <td class="col-auto px-4 py-2">
                                <span class="text-black-500">{{ $car->code }}</span>
                            </td>
                            <td class="col-auto px-4 py-2">
                                <span class="text-black-500">{{ $car->manufacturer }}</span>
                            </td>
                            <td class="col-auto px-4 py-2">
                                <span class="text-black-500">{{ $car->model }}</span>
                            </td>
                            <td class="col-auto px-4 py-2">
                                <span class="text-black-500">${{ $car->price }}.00</span>
                            </td>
                            <td>
                                <!-- buttons need some help -->
                                <button class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-green-200">Details</button>
                                <button class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-blue-200">Edit</button>
                                <button class="rounded py-4 px-8 mr-4 w-1/12 w-20 bg-red-200">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="col-auto px-4 py-2">No cars today, sorry</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot class="bg-gray-800 text-gray-100">
                    <tr>
                        <td class="col-auto px-4 py-2"></td>
                    </tr>
                    </tfoot>
                </table>
@endsection('content')
