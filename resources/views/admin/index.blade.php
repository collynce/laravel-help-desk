@extends('layouts.app')

@section('content')
<div>
    <admin-view>
        <slot></slot>
    </admin-view>
    <router-view></router-view>
</div>
@endsection
