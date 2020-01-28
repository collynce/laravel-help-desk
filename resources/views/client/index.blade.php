@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-6 mx-auto">
            <ticketview></ticketview>

            {{--                <table class="table-auto">--}}
            {{--                    <thead>--}}
            {{--                    <tr>--}}
            {{--                        <th class="px-4 py-2">#</th>--}}
            {{--                        <th class="px-4 py-2">Subject</th>--}}
            {{--                        <th class="px-4 py-2">Status</th>--}}
            {{--                        <th class="px-4 py-2">Category</th>--}}
            {{--                        <th class="px-4 py-2">Assigned To</th>--}}
            {{--                        <th class="px-4 py-2">Created On</th>--}}
            {{--                        <th class="px-4 py-2">Actions</th>--}}
            {{--                    </tr>--}}
            {{--                    </thead>--}}
            {{--                    <tbody>--}}
            {{--                    @foreach($ticket as $t)--}}
            {{--                        <tr>--}}

            {{--                            <td class="border px-4 py-2">{{$t->id}}</td>--}}
            {{--                            <td class="border px-4 py-2">{{$t->subject}}</td>--}}
            {{--                            <td class="border px-4 py-2">{{$t->status->status}}</td>--}}
            {{--                            <td class="border px-4 py-2">{{$t->category->category}}</td>--}}
            {{--                            <td class="border px-4 py-2">{{$t->category->category}}</td>--}}
            {{--                            <td class="border px-4 py-2">{{$t->created_at->diffForHumans() }}</td>--}}
            {{--                            <td class="border px-4 py-2">--}}
            {{--                                <a href="{{url('/ticket/details', [$t->id])}}"--}}
            {{--                                   class="bg-blue-700 hover:bg-teal-300  text-white font-bold py-2 px-4 rounded-full">View</a>--}}
            {{--                                --}}{{--                                <a href="" class="bg-yellow-700 hover:bg-teal-300 text-white font-bold py-2 px-4 rounded-full">Edit</a>--}}
            {{--                                <a href="{{route('tickets.destroy',[$t->id])}}"--}}
            {{--                                   class="bg-red-700 hover:bg-teal-300  text-white font-bold py-2 px-4 rounded-full">--}}
            {{--                                    Delete--}}
            {{--                                </a>--}}
            {{--                            </td>--}}

            {{--                        </tr>--}}
            {{--                    @endforeach--}}
            {{--                    </tbody>--}}
            {{--                </table>--}}
        </div>

    </div>
@endsection

