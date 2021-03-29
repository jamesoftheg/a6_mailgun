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
            <tr>
                <td>Carrot</td>
                <td>Vegetable</td>
                <td>.99</td>
            </tr>
        </tbody>
    </table>
@endsection