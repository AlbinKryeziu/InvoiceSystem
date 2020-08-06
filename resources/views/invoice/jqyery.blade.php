<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Dynamically Add / Remove input fields in Laravel 5.8 using Ajax jQuery</h3>
     <br />
   <div class="table-responsive">
                <form id="form-data" method="post" action="{{ route('ajax-request') }}">
                 <span id="result"></span>
                 <table class="table table-bordered table-striped" id="user_table">
               <thead>
                <tr>
                    <th width="25%">Product</th>
                    <th width="25%">Qty</th>
                    <th width="25%">Price</th>
                    <th width="45%">Total</th>
                    <th width="30%">Action</th>
                </tr>
               </thead>
               <tbody>

               </tbody>
               <tfoot>
                <tr>
                  <td colspan="4" align="right">&nbsp;</td>
                  
                  <td>
                
   
 
                 
                  @csrf
                  <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                 </td>
              
                </tr>
               </tfoot>
               
               </table>
            </form>
         </div>
       </div>
       
  
 </body>
</html>


<script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
   html += '<td><input type="text" name="product[]"  placeholder="enter product"class="form-control" allProducts /></td>';
            html += ' <td><input type="number" name="qty[]"  placeholder="enter qty" class="form-control qty" step="0" min="0"/></td>';
            html += ' <td><input type="number" name="price[]" placeholder="enter price"class="form-control price" step="0.00" min="0"/></td>';
            html += ' <td><input type="number" name="total[]" id="" placeholder="0.00" class="form-control total" /></td>';
       
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 
  

	

$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});



});

	

function calc()
{
	$('#tab_logic tbody td ').each(function(i, element) {
		var html = $(this).html();
   
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			var product = $(this).find('.product').val();
    
    
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