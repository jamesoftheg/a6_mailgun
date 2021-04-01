<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')
    <div class="container">
        <h1>Shopping Page</h1>
        <p>Goods and services.</p>

        <h1>Items</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @if(count($items) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Item Name:</th>
                    <th scope="col">Description:</th>
                    <th scope="col">Price:</th>
                    <th scope="col">Quantity:</th>
                    <th scope="col">Add to Cart:</th>
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
        @else
            <p>No items found.</p>
        @endif

    </div>
    
    <h1>Shopping Cart</h1>
    <div class="container">
        <div class="hotelcard">
        @if(count($items) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Item:</th>
                    <th scope="col">Item Price:</th>
                    <th scope="col">Quantity:</th>
                    <th scope="col">Total Price:</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $key => $item)
                        <tr>
                            
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>Test</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No items found.</p>
        @endif
        </div>
    </div>

@endsection