@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="flex mx-auto mt-16 px-4">
            <div class="flex-1 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-center font-bold">Existing IT Engineers</h1>
                <ul class="list-group mx-auto">
                    @foreach($engineers as $eng)
                        <li type="a">
                            {{$eng->users->name}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-1 text-gray-700  px-4 py-2 m-2">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('engineers.store')}}"
                      method="post">
                    @csrf
                    <div class="inline-block mb-4 w-full relative">
                        <label for="users_id" class="block text-gray-700 text-sm font-bold mb-4">Select and Add From
                            Current Users</label>
                        <select name="users_id" id="users_id"
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select...</option>
                            @foreach($users as $user)
                                @foreach($user->users as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class=" items-center text-center justify-between">
                        <button type="submit"
                                class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
