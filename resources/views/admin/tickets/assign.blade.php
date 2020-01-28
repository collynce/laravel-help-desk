@extends('layouts.app')

@section('content')
    <div class="container mt-16">
        <div>
            <h3 class="font-bold text-center mb-3">Closed Tickets</h3>
        </div>
        <table class="table-auto mx-auto px-4 w-full">
            <thead class="bg-gray-400">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Category</th>
                <th class="border px-4 py-2">Subject</th>
                <th class="border px-4 py-2">Assigned To</th>
                <th class="border px-4 py-2">Date Closed</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td class="border px-4 py-2">{{$ticket->id}}</td>
                    <td class="border px-4 py-2">{{$ticket->category->category}}</td>
                    <td class="border px-4 py-2">{{$ticket->subject}}</td>
                    <td class="border px-4 py-2">{{$ticket->engineer}}</td>
                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($ticket->closed_at)->diffForHumans()}}</td>
                    <td class="border py-2 px-4 text-center">
                        <a href="">
                            <span class="mdi mdi-lock-open mdi-18px px-3"></span>
                        </a>
                        <a href="">
                            <span class="mdi mdi-eye mdi-18px px-3"></span>
                        </a>
                        <a href="">
                            <span class="mdi mdi-delete-empty mdi-18px px-3"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
