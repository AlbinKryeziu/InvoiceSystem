@extends('layouts.app')

@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                   <br>
                   <style>

.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    

.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Invoices <b>Details</b></h2></div>
					<br>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <form action="{{route('searchInvoices')}}" method="get">
                                <input type="text" name="qry" class="form-control" placeholder="Search&hellip;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      @php
      $b=1;
  @endphp
     
                 @if (session('message'))
                <div class="alert alert-secondary text-center">
                {{ session('message') }}
    </div>
  
     @else 
            <table class="table table-striped table-hover table-bordered">
                <thead>
                 <tr>
                        <th>#</th>
                        <th>Nr_Invoice </th>
                        <th>Date</th>
                       
                        <th>Sub_Total</th>
                        <th>Tax_amount</th>
						<th>Total_amount</th>
					    <th>Download PDF</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
             
  
         
                     @foreach ($invoice as $i )
               
				        <tr>
                        <td>@php  echo $b++; @endphp</td>
                        <td>{{ $i->invoice_no }}</td>
                        <td>{{ $i->invoice_date }}</td>
                      
						<td>{{ $i->sub_total }}</td>
                        <td>{{ $i->tax_amount }}</td>
					    <td>{{ $i->total_amount }}</td>
				
                        <td>
                            <a href="{{ route( 'downloadInvoice' ,$i->id) }}" class="btn btn-success col-md-3 float:right" style="background-color: #17a2b8; border:#17a2b8; padding: 5px 4px; "><i style="color: white" class="material-icons">&#xE147;</i></a>
                        </td>
                      
                         
                     
                  
                        <td>
                          <a href="{{ route('edit',$i->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                         @method('DELETE')
                             @csrf
                          <a href="{{route('destroy2', $i->id) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                         
                         
                        </td>
                        </form>
                    </tr>
                   @endforeach
                   @endif
                  
                </tbody>
            </table>
              @if (count($invoice) == 0)
              <br>
                        <p class="text-center">No results found</p>
                    @endif
          
 <ul class="pagination justify-content-end">
    <li class="page-item disabled">
    
    </li>
  {{ $invoice->links() }}
      
    </li>
  </ul>
        
        </div>
    </div>  
</div>   
                    
                     

{{-- @foreach ($invoice as $inv )

<p>{{ $inv->id }}

@foreach ($inv->product as $p )
<p>{{ $p->product }}</p> --}}
    
{{-- @endforeach
    
@endforeach --}}

<script>
function deleteCategory(id){
            
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('del-category-'+id).submit();
                    swal(
                    'Deleted!',
                    'Category has been deleted.',
                    'success'
                    )
                }
            })
        }
</script>
@endsection