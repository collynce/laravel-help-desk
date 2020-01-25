@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <form class="form" action="{{route('category.index')}}" method="post">
                @csrf
                <input placeholder="Category" type="text" name="category">
                <br>
                <button type="submit" class="btn btn-lg btn-primary">ADD</button>
            </form>
        </div>
        <br>
    </div>
@endsection
