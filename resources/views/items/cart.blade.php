<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')

<div class="container">
        
    <h1>Shopping Cart</h1>
    <div class="container">
        <div class="hotelcard">

        <?php $rowTotal = 0; ?>
        <?php $total = 0; ?>

        @if(session()->has('cart'))
           <p>Cart found.</p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Item Name:</th>
                    <th scope="col">Price:</th>
                    <th scope="col">Quantity:</th>
                    <th scope="col">Total:</th>
                </tr>
                @foreach(session('cart') as $id => $item)
                    <?php $rowTotal = $item['quantity'] * $item['price']; ?>
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td><?php $rowTotal ?></td>
                    </tr>
                @endforeach
        @else
            <p>No items found.</p>
        @endif
        </div>
    </div>

</div>











@endsection