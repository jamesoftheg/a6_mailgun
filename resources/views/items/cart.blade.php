<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')

<div class="container">
        
    <h1>Shopping Cart</h1>
    <div class="container">
        <div class="hotelcard">

        @if(session()->has('cart'))
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

            <h3>Total:</h3>
            @if(session()->has('totalcost'))
                ${{session()->get('totalcost')}}
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

            <h1>Checkout:</h1>

            <form action="/checkout" method="post">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name"  name="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name"  name="last_name">
                </div>
                <div class="form-group">
                    <label for="credit_card">Credit Card:</label>
                    <input type="text" class="form-control" id="credit_card"  name="credit_card">
                </div>
                <div class="form-group">
                    <label for="expiry">Expiry (Month/Year):</label>
                    <input type="month" class="form-control" id="expiry"  name="expiry">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email"  name="email">
                </div>
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>

        @else
            <h2>Cart not found.</h2>
            <button type="submit" class="btn btn-danger"><a class="nav-item nav-link" href="/items">Back to Shopping Page</a></button>
        @endif
        </div>
    </div>

</div>

@endsection