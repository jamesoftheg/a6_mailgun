<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <p>This is the checkout page.</p>

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
                                <?php $totalprice = $item->price * $item->quantity ?>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td><?php $totalprice ?></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No items found.</p>
            @endif
            </div>
        </div>

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
            <form action="/bookings" method="post">
                @csrf
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" id="firstName"  name="firstName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName"  name="lastName">
                </div>
                <div class="form-group">
                    <label for="creditCard">Credit Card:</label>
                    <input type="date" class="form-control" id="creditCard" name="creditCard"/>
                </div>
                <div class="form-group">
                    <label for="expiryDate">Expiry Date:</label>
                    <input type="date" class="form-control" id="expiryDate" name="expiryDate"/>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="date" class="form-control" id="email" name="email"/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <p>No items to checkout.</p>
        @endif
    </div>
    
@endsection