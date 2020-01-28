@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full mx-auto mt-12 max-w-xl">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"  action="{{route('category.index')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                        Category Name
                    </label>
                    <input required name="category" class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" id="category" type="text" placeholder="Enter ticket category">
                    <p class="text-red-500 text-xs italic"></p>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
