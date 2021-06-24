@extends("layouts.app")

@section("content")


    <h1>Profile</h1>
    <h1>{{price_format(auth()->user()->balance) }}</h1>


@endsection
