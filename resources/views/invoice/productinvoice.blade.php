@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card">
  @foreach ($invoice as $i )
<div class="card-header">
Date <strong>{{ $i->invoice_date }}</strong>

    

<strong></strong> 
  <span class="float-right"> <strong>Status:</strong> </span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-8">

<div>
<strong>Company Name</strong>
</div>
<div>Address</div>
<div>Phone</div>
<div>Email: info@webz.com.pl</div>
<div>Nr Bissnes</div>
</div>

<div class="col-sm-4">

<div>
<strong>{{ $i->client_name }}</strong>
</div>
<div>{{ $i->client->email }}</div>
<div>{{ $i->client->address }}</div>
<div>{{ $i->client->phone }}</div>

</div>



</div>
<br>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Product</th>


<th class="right">Qty</th>
  <th class="center">Price</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
@foreach ($product as $p )
    

<tr>
<td class="center">1</td>
<td class="left strong">{{ $p->product }}</td>


<td class="right">{{ $p->qty }}</td>
  <td class="center">{{ $p->price }}</td>
<td class="right">{{ $p->total }}</td>
</tr>
<tr>

    
@endforeach

</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr>

    

<td class="left">
<strong>Subtotal</strong>
</td>
<td class="right">{{$i->sub_total}}</td>
</tr>
<tr>
<td class="left">
<strong>Discount (20%)</strong>
</td>
<td class="right">{{ $i->tax_amount }}</td>
</tr>

<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>{{ $i->total_amount}}</strong>
@endforeach
</td>
</tr>
</tbody>
</table>



</div>

</div>

</div>
</div>
</div>




@endsection