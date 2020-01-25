@extends('layouts.app')

@section('content')
    <div>
        {{$category}}
        {{auth()->user()->id}}
    </div>
@endsection
