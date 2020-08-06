<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceProduct;
use App\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);


        $this->validate($request, [
            'client_name' => 'max:255|string',
            'client_email' => 'email|max:255|unique:clients,email',
            'client_phone' => 'max:255',
            'client_address' => 'max:255|string',

            'category.*' => 'required|string|max:255',
            'product.*' => 'required|string|max:255',
            'qty.*' => 'required|numeric|gte:1',
            'price.*' => 'required|numeric|gte:0',
            'total.*' => 'required|numeric|gte:0',
            'tax' => 'numeric|gte:0|lte:100',
            'sub_total' => 'required',
            'tax_amount' => 'required',
            'total_amount' => 'required',
            'status' => 'required',
        ]);
        if (Client::where('email', $request->input('client_email'))->count() > 0) {

            return redirect()->back()->with('error', 'This user email  exist ');
        }
        $client = Client::create([
            'name' => $request['client_name'],
            'email' => $request['client_email'],
            'phone' => $request['client_phone'],
            'address' => $request['client_address'],
        ]);



        $invoice = Invoice::create([
            'client_id' => $client->id,
            'isOffer' => $request['status'],
            'invoice_no' => rand(),
            'invoice_date' => Carbon::now()->toDateString(),
            'sub_total' => $request['sub_total'],
            'tax_amount' => $request['tax_amount'],
            'total_amount' => $request['total_amount'],
        ]);




        for ($i = 0; $i < count($request['category']); $i++) {
            InvoiceProduct::create([
                'invoice_id' => $invoice->id,
                'quantity' => $request['qty'][$i],
                'price' => $request['price'][$i],
                'category' => $request['category'][$i],
                'product' => $request['product'][$i],
                'total' => $request['total'][$i],
            ]);
        }

        return redirect()->back()->with('success', 'New invoice saved');
    }

  
    public function newinvoice()
    {
        return view('invoice.newinvoice');
    }

   
    public function offert()
    {

        $offert = Invoice::where('isOffer', 0)->get();
        return view('invoice.offert', compact('offert'));
    }
   
   
    public function allinvoice()
    {

        $invoice = Invoice::where('isOffer',1)->paginate(10);

        return view('invoice.allinvoice', compact('invoice'));
    }

   
    public function searchInvoice(Request $request)
    {
        $qry = $request['qry'];
        $invoice = Invoice::where('invoice_no', 'LIKE',  '%' . $qry . '%')
            ->orWhere('invoice_date', 'LIKE', '%' . $qry . '%')
            ->orWhere('client_id', 'LIKE',  '%' . $qry . '%')
            ->paginate(10);
        return view('invoice.allinvoice', compact('invoice'));
    }

   
    public function searchOffer(Request $request)
    {
        //Following code translates to
        //SELECT * FROM User WHERE role_id = 3 and (name LIKE $request OR last_name LIKE $request...)



        $offert = Invoice::where(function ($query) use ($request) {
            $query->orWhere('invoice_no', 'LIKE',  '%' . $request['qry'] . '%')
                ->orWhere('invoice_date', 'LIKE', '%' . $request['qry'] . '%')
                ->orWhere('client_id', 'LIKE',  '%' . $request['qry'] . '%');
        })
            ->where('isOffer', false)
            ->paginate(5);


        return view('invoice.offert', compact('offert'));
    }

   
    public function showInvoicePDF($id)
    {
        $client = Client::find(Invoice::find($id)->client_id);

        $invoices = InvoiceProduct::where('invoice_id', $id)->get();

        $totalfinal = Invoice::where('id', $id)->get();


        $allInvoicesWithCategories = [];
        $categoryInvoice = [];
        $category = $invoices[0]->category;


        for ($i = 0; $i < count($invoices); $i++) {
            if (strcmp($category, $invoices[$i]->category) != 0 || $i == count($invoices) - 1) {

                if ($i == count($invoices) - 1) {
                    if (strcmp($category, $invoices[$i]->category) == 0)
                        array_push($categoryInvoice, $invoices[$i]);
                    else {
                        $allInvoicesWithCategories[$category] = $categoryInvoice;
                        $category = $invoices[$i]->category;
                        $categoryInvoice = [];
                        array_push($categoryInvoice, $invoices[$i]);
                        $allInvoicesWithCategories[$category] = $categoryInvoice;
                    }
                }

                $allInvoicesWithCategories[$category] = $categoryInvoice;
                $categoryInvoice = [];
                $category = $invoices[$i]->category;
            }
           $array =array_push($categoryInvoice, $invoices[$i]);

           
        }


        // return view('invoice.invoice_pdf')

        $pdf = PDF::loadView('invoice.invoice_pdf', compact('client', 'allInvoicesWithCategories', 'totalfinal'));
        return $pdf->download('Invoice of: ' . $client->name . ', first printed at ' . $invoices[0]->updated_at . '.pdf');
    }


    public function destroy2($id)
    {
        $get = Invoice::where('id', $id)->first();
       if($get->isOffer==1){
         
        $get->delete();
        return redirect()->back()->with('success', 'Invoice has ben deleted');
       }
       else { 
        $get->delete();
        return redirect()->back()->with('success', 'Offerts has ben deleted');
       }
    }

    public function edit($id)
    {

        $invoice = Invoice::find($id);
        $category=InvoiceProduct::where('invoice_id',$id)->get();
        return view('invoice.edit', compact('invoice','category'));
    }

    public function updateInvoice(Request $request){
        
        return $request;
    }
}
