<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Company Name</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
      <tr>
        {{-- logo --}}
       
        <td align="right">
            <h3 align="right">Shinra Electric power company</h3>
            <pre>
                {{$client->name}}
                {{$client->address}}
                {{-- Tax ID --}}
                {{$client->phone}}
                {{-- fax --}}
            </pre>
        </td>
    </tr>

  </table>

  {{-- <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table> --}}

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        {{-- <th>#</th>
        <th>Category</th> --}}
        <th>Product</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($allInvoicesWithCategories as $item)
        
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
            <tr><td align="left"><strong>{{$item[0]->category}}</tr>
           
            @foreach ($item as $item2)
                <tr>
                    <td align="center">{{$item2->product}}</td>
                    <td align="center">{{$item2->quantity}}</td>
                    <td align="center">{{$item2->price}}</td>
                    <td align="center">{{$item2->total}}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>

    <tfoot>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr>
      @foreach ($totalfinal as $i)
          
      
            <td colspan="2"></td>
            <td align="right">Subtotal $</td>
            <td align="right">{{$i->sub_total}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td align="right">Tax $</td>
            <td align="right">{{$i->tax_amount}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">{{$i->total_amount}}</td>
        </tr>
        @endforeach
    </tfoot>
  </table>

</body>
</html>