@extends('layouts.app')

@section('content')



<title>Bootstrap Simple Data Table</title>

 
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
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #7a2b;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
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
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <form action="{{ route('searchclient') }}" method="get">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" name="qry" id="search" class="form-control" placeholder="Search&hellip;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @php $b=1 @endphp
               @if (session('message'))
                <div class="alert alert-secondary text-center">
                {{ session('message') }}
    </div>
  
     @else 
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                        <th></th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Address</th>
                        <th>Email <i class="fa fa-sort"></i></th>
                        <th>Phone</th>
                        <th>New Invoice<i class="fa fa-sort"></i></th>
                        <th>Invoice<i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                     
                <tbody>
             
                 @foreach ($client as $c )
                    <tr>
                        <td>@php  echo $b++; @endphp</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->address }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->phone }}</td>
                      <td><form action="" method="POST"><input type="hidden" value="{{ $c->id }}" name="id"><button value="submit" class="btn btn-success" style="background-color: #17a2b8; border:#17a2b8; padding: 5px 4px;"><i class="material-icons">&#xE147;</i>@csrf</form></td>
                        <td><form action="{{ route('invoiceClient') }}" method="POST"><input type="hidden" value="{{ $c->id }}" name="id"><button value="submit" class="btn btn-success" style="background-color: #17a2b8; border:#17a2b8; padding: 5px 4px;"><i class="material-icons">&#xE147;</i>@csrf</form></td>
                        <td>
                            <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                   @endif
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                   
                </ul>
            </div>
        </div>
    </div>  
</div>   



@endsection