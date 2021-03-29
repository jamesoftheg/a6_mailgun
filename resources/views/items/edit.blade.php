<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')
    <h1>{{$title}}</h1>
    <p>This is the edit page.</p>

@endsection