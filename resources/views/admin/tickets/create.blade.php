@extends('layouts.app')

@section('content')
    <div>
        <form class="form-control" action="{{route('tickets.store')}}" method="post">
            @csrf
            <input type="text" placeholder="Subject" name="subject">
            <br>
            <select name="ticket_category_id" id="category">
                <option value="">Select...</option>
                @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->category}}</option>
                @endforeach
            </select>
            <br>
            <input type="text" hidden value="{{Auth::user()->id}}" name="users_id">
            <button type="submit" class="btn btn-dark">ADD</button>
        </form>
    </div>
@endsection
