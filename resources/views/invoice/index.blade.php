@extends('layouts.app')

@section('content')

{{-- Pre made products and rows --}}
<div id="copyProduct" style="display: none">
    <hr />
    {{-- <input type="text" placeholder="Product Name" class="form-control text-center"> --}}
    <input type="text" placeholder="Category" class="product_category form-control text-center mb-2" style="width: 75%; margin: auto">
    <table class="table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}">
        <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Unit price</th>
                <th scope="col">Amount</th>
                <th scope="col">Total Per Unit</th>
            </tr>
        </thead>
        <tbody>
            <tr class="product_subcategory">
                <th scope="row"><input class="product_subcategory_name form-control" type="text" placeholder="Type Name"></th>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-muted">€</span>
                        </div>
                        <input name="price" id="price" class="product_subcategory_price form-control" type="number" value="0" onchange="calculateTotalPrice()" min="0" step="0.01" class="form-control @error('price') eshte jo valide @enderror" value="{{ old('price') }}" autocomplete="off" required>
                    </div>
                </td>
                <td><input class="product_subcategory_amount form-control" type="number" value="1" min="1"></td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-muted">€</span>
                        </div>
                        <input class="product_subcategory_total form-control" value="10" disabled>
                    </div>
                </td>
            </tr>            
        </tbody>
    </table>
    <button class="btn btn-outline-primary" onclick="newRow('test');">+</button>
</div>

<div id="copyRow" style="display: none">
    <tr class="product_subcategory">
        <td scope="row"><input class="product_subcategory_name form-control" type="text" placeholder="Type Name"></td>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">€</span>
                </div>
                <input name="price" id="price" class="product_subcategory_price form-control" type="number" value="0" onchange="calculateTotalPrice()" min="0" step="0.01" class="form-control @error('price') eshte jo valide @enderror" value="{{ old('price') }}" autocomplete="off" required>
            </div>
        </td>
        <td><input class="product_subcategory_amount form-control" type="number" value="1" min="1"></td>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text text-muted">€</span>
                </div>
                <input class="product_subcategory_total form-control" value="10" disabled>
            </div>
        </td>
    </tr>
</div>
{{-- Pre made products and rows --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center h3">{{ __('Invoice Generator') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="invoice">
                        <div id="products">
                            {{-- <input type="text" placeholder="Product Name" class="form-control text-center"> --}}
                            <input type="text" value="Kubeza" class="product_category form-control text-center mb-2" style="width: 75%; margin: auto">
                            <table class="table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Unit price</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Total Per Unit</th>
                                    </tr>
                                </thead>
                                <tbody id="test">
                                    <tr class="product_subcategory">
                                        <td scope="row"><input class="product_subcategory_name form-control" type="text" value="Kocka"></td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-muted">€</span>
                                                </div>
                                                <input name="price" id="price" class="product_subcategory_price form-control" type="number" value="0" onchange="calculateTotalPrice()" min="0" step="0.01" class="form-control @error('price') eshte jo valide @enderror" value="{{ old('price') }}" autocomplete="off" required>
                                            </div>
                                        </td>
                                        <td><input class="product_subcategory_amount form-control" type="number" value="1" min="1"></td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-muted">€</span>
                                                </div>
                                                <input class="product_subcategory_total form-control" value="10" disabled>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="product_subcategory">
                                        <th scope="row"><input class="product_subcategory_name form-control" type="text" placeholder="Type Name"></th>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-muted">€</span>
                                                </div>
                                                <input name="price" id="price" class="product_subcategory_price form-control" type="number" value="0" onchange="calculateTotalPrice()" min="0" step="0.01" class="form-control @error('price') eshte jo valide @enderror" value="{{ old('price') }}" autocomplete="off" required>
                                            </div>
                                        </td>
                                        <td><input class="product_subcategory_amount form-control" type="number" value="1" min="1"></td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-muted">€</span>
                                                </div>
                                                <input class="product_subcategory_total form-control" value="10" disabled>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-outline-primary" onclick="newRow('test');">+</button>
                        </div>
                        <hr>
                        <h4 class="float-right">Total Price: 100</h4>
                        <br>
                        <div id="invoice_footer" class="mt-3">
                            <input type="button" class="btn btn-primary" value="+" onclick="newProduct()">
                            <input type="button" class="btn btn-primary float-right ml-2" value="Save to DB">
                            <input type="button" class="btn btn-primary float-right mx-2" value="Save Offer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function newRow(id) {
        //Copy all child nodes of element with ID copyRow
        var newRow = document.getElementById('copyRow').cloneNode(true).childNodes;
        
        //Make a new element of type <tr class="product_subcategory"> </tr>
        var rowTag = document.createElement('TR');
        rowTag.className = "product_subcategory";

        //Find div where we want to add element
        document.getElementById(id).appendChild(rowTag);

        //Add all childNodes to <td>, and then to <tr>
        newRow.forEach(element => {
            var data = document.createElement('TD');
            data.appendChild(element);

            rowTag.appendChild(data);
        });
    }

    function newProduct() {
        var newElement = document.getElementById('copyProduct').cloneNode(true);
        newElement.removeAttribute('style');
        newElement.removeAttribute('id');
        document.getElementById('products').appendChild(newElement);
    }

    calculateTotal()
    
    function calculateTotal() {
        let x = document.getElementsByClassName('product_subcategory_total');
        
        Array.prototype.forEach.call(x, function (el) {
            console.log(el.innerText);
        })
    }
</script>
@endsection