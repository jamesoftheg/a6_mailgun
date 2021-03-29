<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')
    <h1>Items</h1>
    <p>This is the index page.</p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection