@component('mail::message')
# Web Receipt

Thank you for shopping with us today.
Your order has been received and will be processed shortly.

<div class="container">

<?php $rowTotal = 0; ?>
<?php $total = 0; ?>
# User Information
@if(session()->has('userinfo'))
@foreach(session('userinfo') as $info)
<p>First Name: {{$info['firstname']}}</p>
<p>Last Name: {{$info['lastname']}}</p>
<p>Credit Card: {{$info['creditcard']}}</p>
<p>Expiration Date: {{$info['expiry']}}</p>
<p>Email: {{$info['email']}}</p>
@endforeach
@else
<p>No user info.</p>
@endif

@if(session()->has('cart'))
# Your Cart
<table class="table">
<thead class="thead-dark">
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
<td>x {{$item['quantity']}}</td>
<td>${{$item['quantity'] * $item['price']}}</td>
</tr>
@endforeach
</tbody>
</table>
@else
<p>Checkout empty.</p>
@endif
<h3>Total:</h3>
@if(session()->has('totalcost'))
${{session()->get('totalcost')}}
@endif
</div>

Thanks,<br>
{{ config('app.name') }}
<p>James Gelfand - 000275852</p>
@endcomponent
