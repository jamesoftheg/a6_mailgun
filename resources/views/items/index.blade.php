<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')
    <div class="container">
        <h1>Shopping Page</h1>

        <h1>Books Available:</h1>

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                            <td>${{$item->price}}</td>
                            <form action="/add/{{$item->id}}" method="post">
                            <td>                    
                                @csrf
                                <div class="form-group">
                                    <input type="number" class="form-control" id="quantity"  name="quantity">
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-warning btn-block text-center">Add to Cart</button>
                            </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button class="btn btn-warning btn-block text-center"><a class="nav-item nav-link" href="/cart">View Cart</a></button>
        @else
            <h2>No items found.</h2>
        @endif

    </div>
    <div class="container">
        <div class="hotelcard">

        @if(session()->has('cart'))
           <h2>Cart found.</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Item Name:</th>
                    <th scope="col">Price:</th>
                    <th scope="col">Quantity:</th>
                    <th scope="col">Total:</th>
                </tr>
                </thead>
                <tbody>
                @foreach(session('cart') as $id => $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>${{$item['price']}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td>${{$item['quantity'] * $item['price']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h2>Cart empty.</h2>
        @endif
        </div>
    </div>

@endsection