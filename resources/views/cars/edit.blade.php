index.blade.php@extends('layouts.mylayout')
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

                    </tbody>
                    <tfoot class="bg-gray-800 text-gray-100">
                    <tr>
                        <td class="col-auto px-4 py-2">
                            <h2><a class="ded-btn" href="{{route('cars.add')}}">Add another car!</a></h2>
                        </td>
                    </tr>
                    </tfoot>
                </table>
@endsection('content')
