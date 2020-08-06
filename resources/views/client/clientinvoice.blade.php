@extends('layouts.app')

@section('content')

<div class="row">
    
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Invoice of {{ $client }}</h4>
    </div>
   
</div>
<br>

 
<div class="row doctor-grid">

    
    @foreach ($invoice as $inv )
<div class="col-md-4 col-sm-3 col-lg-3">
  
        <div class="profile-widget">
           
            <div class="dropdown profile-action">
               
               
            </div>
            
            <div class="doc-prof text-center"><strong>Invoice No</strong>/ {{ $inv->invoice_no }}</div>
            <div class="doc-prof  text-center"><strong>Invoice date</strong>/ {{ $inv->invoice_date }}</div>
            <div class="doc-prof  text-center"><strong>Invoice Total</strong>/ {{ $inv->total_amount }}</div>
            <div class="user-country">
                <i class=""></i> 
            </div>
            <br>
                 <td><form action="{{ route('productclient') }}" method="POST"><input type="hidden" value="{{ $inv->id }}" name="id"><button value="submit" class="btn btn-success" style="background-color: #17a2b8; border:#17a2b8; padding: 4px 4px;"><i class="material-icons">&#xE147;</i>@csrf</form></td>
            </div>
          
         </div>
         @endforeach   

@endsection