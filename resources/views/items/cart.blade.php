<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')

<div class="container">
        
    <h1>Shopping Cart</h1>
    <div class="container">
        <div class="hotelcard">
        @if(session()->has('Test'))
           <p>Cart found.</p>
                <p>
                    <td>{{session()->get('Test')}}</td>
                </p>
            
        @else
            <p>No items found.</p>
        @endif
        </div>
    </div>

</div>











@endsection