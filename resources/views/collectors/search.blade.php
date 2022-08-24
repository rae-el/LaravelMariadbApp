@extends('layouts.mylayout')
@section('content')
<!--header-->
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <!--body-->
                <table class="table w-full">
                    <thead class=" bg-gray-800 text-gray-100">
                    <tr>
                        <h3 class=" px-2 py-4 bg-gray-800 text-gray-100 text-xl">
                            Collectors
                        </h3>
                    </tr>
                    <form method="GET" action="{{ route('collectors.search') }}" name="search" >
                        <div class="pb-4 flex bg-gray-800 text-gray-100">
                            <input type="search" id="search" name="query" class="flex-1 rounded text-gray-600" placeholder="Search for a collector:"/>
                            <button type="submit" name="search" class="rounded py-4 px-8 mr-4 w-1/12 w-20">Search</button>
                            <a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-green-200 text-gray-600" href="{{ route('collectors.add') }}">Add new</a>
                        </div>
                    </form>
                    <tr class="columns-2">
                        <th class="col-auto px-4 py-2 text-left">Given Name</th>
                        <th class="col-auto px-4 py-2">Family Name</th>
                        <th class="col-auto px-4 py-2">Cars</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($results as $collector)
                        <tr class="even:bg-gray-100 border-gray-300 border border-bottom border-l-0 border-r-0 hover:bg-neutral-300">
                            <td class="col-auto px-4 py-2">
                                <span class="text-black-500">{{ $collector->given_name }}</span>
                            </td>
                            <td class="col-auto px-4 py-2">
                                <span class="text-black-500">{{ $collector->family_name }}</span>
                            </td>
                            <td class="col-auto px-4 py-2">
                                <span class="text-black-500">
                                @forelse($collector->cars as $car)
                                        {{$car}},
                                    @empty
                                        no current cars
                                    </span>
                                @endforelse
                            </td>
                            <td>
                                <a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-green-200" href="{{ route('collectors.show',$collector->id) }}">Details</a>
                                <a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-blue-200" href="{{ route('collectors.edit',$collector->id) }}">Edit</a>
                                <a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-red-200" href="{{ route('collectors.delete',$collector->id) }}">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="col-auto px-4 py-2">No collectors found, please try again</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>
                        </td>
                    </tr>
                    </tfoot>
                </table>
@endsection('content')
