@component('mail::message')
# Introduction

The body of your message.

<div class="container">
<div class="hotelcard">

<?php $rowTotal = 0; ?>
<?php $total = 0; ?>

@if(session()->has('userinfo'))
@foreach(session('userinfo') as $info)
{{$info['firstname']}}
{{$info['lastname']}}
{{$info['creditcard']}}
{{$info['expiry']}}
{{$info['email']}}
@endforeach
@else
<p>No user info.</p>
@endif

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
</thead>
<tbody>
@foreach(session('cart') as $id => $item)
<p hidden>{{$total += $item['quantity'] * $item['price']}}</p>
<tr>
<td>{{$item['name']}}</td>
<td>{{$item['price']}}</td>
<td>{{$item['quantity']}}</td>
<td>{{$item['quantity'] * $item['price']}}</td>
</tr>
@endforeach
</tbody>
</table>
<p><?php $total ?></p>
@else
<p>Checkout empty.</p>
@endif
</div>
</div>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
