@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex mx-auto mt-16 px-4">
            <div class="flex-1 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
               <h1 class="text-center font-bold">Existing Ticket Categories</h1>
                <ul class="list-group mx-auto">
                    @foreach($category as $cat)
                        <li type="a">
                            {{$cat->category}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-1 text-gray-700  px-4 py-2 m-2">
                <h3 class="text-center font-bold">New Category</h3>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('category.index')}}"
                      method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                            Category Name
                        </label>
                        <input required name="category"
                               class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"
                               id="category" type="text" placeholder="Enter ticket category">
                        <p class="text-red-500 text-xs italic"></p>
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
