@extends('layouts.mylayout')
@section('content')
<!--header-->
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <!--body-->
                <table class="table w-full">
                    <thead class=" bg-gray-800 text-gray-100">
                    <tr>
                        <h3 class=" px-2 py-4 bg-gray-800 text-gray-100 text-xl">
                            DELETE {{$collector->given_name}} {{$collector -> family_name}}
                        </h3>
                    </tr>
                    <tr class="columns-2">
                        <th class="col-auto px-4 py-2 text-left">Given Name</th>
                        <th class="col-auto px-4 py-2">Family Name</th>
                        <th class="col-auto px-4 py-2">Cars</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="even:bg-gray-100 border-gray-300 border border-bottom border-l-0 border-r-0 hover:bg-neutral-300">
                        <td class="col-auto px-4 py-2">
                            <span class="text-black-500">{{$collector->given_name}}</span>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <span class="text-black-500">{{$collector->family_name}}</span>
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
                    </tr>
                    </tbody>
                    <tfoot class="text-gray-600">
                    <tr>
                        <td class="col-auto px-4 py-2">
                            <h3><a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-blue-200" href="{{ route('collectors.index') }}">Cancel</a></h3>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <h3><a class="rounded py-1 px-1 mr-1 w-1/12 w-10 bg-green-200" href="{{route('collectors.edit',$collector->id)}}">Edit</a></h3>
                        </td>
                        <td class="col-auto px-4 py-2">
                            <form method="POST" action="{{ route('collectors.destroy', $collector) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="destroy" class="rounded py-1 px-1 ml-3 bg-red-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
@endsection('content')
