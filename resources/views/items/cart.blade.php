<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')

<div class="container">
        
    <h1>Shopping Cart</h1>
    <div class="container">
        <div class="hotelcard">
        @if(count($items) > 0)
            <table class="table" id="cart">
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

</div>











@endsection