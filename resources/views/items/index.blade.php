<!-- This specifies the layout we want to use -->
@extends('layouts.app')

<!-- If we want this to go into our content we have to wrap in section -->
@section('content')
    <div class="container">
        <h1>Shopping Page</h1>
        <p>Goods and services.</p>

        <h1>Items</h1>

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
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
                            <td>{{$item->price}}</td>
                            <td><a href="{{ url('add/'.$item->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></td>
                            <form action="/items" method="post">
                            <td>                    
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="quantity"  name="quantity">
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No items found.</p>
        @endif

    </div>
    

@endsection