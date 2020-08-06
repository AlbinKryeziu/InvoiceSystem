@extends('layouts.app')

@section('content')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
      <div class="row clearfix">
  <div class="col-md-12">
  <form id="form-data" method="post" action="{{ route('invoiceclient') }}">
     @csrf
 
     <h3 class="text-center">Client Data</h3>
     <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">Client name</th>
            <th class="text-center">Client email</th>
            <th class="text-center">Client phone</th>
            <th class="text-center">Client address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
         
              
              <input type="hidden" name='client_id' value="{{ $client->id}}" />
            <td><input type="text" name='client_name' value="{{ $client->name}}" placeholder='Enter Client Name' class="form-control"/></td>
            <td><input type="email" name='client_email' value="{{ $client->email}}" placeholder='Enter Client Email' class="form-control"/></td>
            <td><input type="tel" name='client_phone' value="{{ $client->phone}}" placeholder='Enter Client Phone No' class="form-control"/></td>
            <td><input type="text" name='client_address' value="{{ $client->address}}" placeholder='Enter Client Address' class="form-control"/></td>
          </tr>

        </tbody>
     
     </table>
     <h3 class="text-center">Invoice Data</h3>
      <table class="table table-bordered table-hover" id="tab_logic">     
        <thead>
       
          <tr id="num">
            <th class="text-center"> # </th>
            <th class="text-center"> Category </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        
        </thead>
         
        <tbody>
     
          <tr id='addr0'>
        
            <td>1</td>
           
            <td><input type="text" name='category[]'  id="myText" value="{{old('category[]')}}" placeholder='Enter Product Category' class="form-control cta"  /></td>
            <td><input type="text" name='product[]' id="" value="{{old('product[]')}}"  placeholder='Enter Product Name' class="form-control" allProducts /></td>
            <td><input type="number" name='qty[]'   id="" value="{{old('qty[]')}}"  placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' id="" value="{{old('price[]')}}"  placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' id="" value="{{old('total[]')}}" placeholder='0.00' class="form-control total" readonly/></td>
            </td>
         
          </tr> 
           <tr id='addr1'></tr>
          
        </tbody>
         
      </table>
  
    </div>
   </div>
   
 
  <div class="row clearfix">
    <div class="col-md-12">
      <button type="button" id="add_row" class="btn btn-default pull-left">Add Row</button>
    
     
      
      <button  type="button" id='delete_row' class="pull-right btn btn-default">Delete Row</button>
    </div>
  </div>

   


  <div class="row clearfix float-right" style="margin-top:40px; ">
    <div class="pull-left col-md-12 ">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" name="tax" id="tax" value="0" min="0" max="100">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
         </tbody>
        </table>
         <div class="form-check form-check-inline">
                                     	
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" checked>
									<label class="form-check-label" for="doctor_active">
								Inovice
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status"  value="0">
								
									Offert
									</label>
								</div>
                <br>
             
     <input type="submit" id="" class="btn btn-default pull-right"></button>
    
      </div> 
      
      
  
      
   </div>
  </div>
  </form>
       

<script>
$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        var lastProduct = jQuery("#addr"+(i-1)).find("td:eq(1) input").val();
        jQuery("#addr"+(i)).find("td:eq(1) input").val(lastProduct);
        i++; 
     });
     
    $("#delete_row").click(function(){
        if(i>1){
        $("#addr"+(i-1)).html('');
        $("#addr"+(i)).remove();
        i--;
        }
        calc();
    });
 
 
    
    $('#tab_logic tbody').on('keyup change',function(){
        calc();
    });
    $('#tax').on('keyup change',function(){
        calc_total();
    });
    

});

$(document).ready(function(){
  $("#btn1").click(function(){
    $("ol").append("<li>other list<br>");
  });

  $("#btn2").click(function(){
    $("ol").append("<input></input><br>");
  });
});
function showContent() {
     myTable = document.getElementsById("form-data")[0];
    myClone = myTable.cloneNode(true);
    document.body.appendChild(myClone);
  
}


function calc()
{
    $('#tab_logic tbody tr').each(function(i, element) {
        var html = $(this).html();
    var allProducts = []
        if(html!='')
        {
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
        
     
    
            $(this).find('.total').val(qty*price);
            calc_total();
        }
    });
}

function calc_total()
{
    total=0;
    $('.total').each(function() {
        total += parseInt($(this).val());
    });
    $('#sub_total').val(total.toFixed(2));
    tax_sum=total/100*$('#tax').val();
    $('#tax_amount').val(tax_sum.toFixed(2));
    $('#total_amount').val((tax_sum+total).toFixed(2));
}
</script>

@endsection
                   
