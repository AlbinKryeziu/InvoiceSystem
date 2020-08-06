<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use Illuminate\Support\Carbon;
use App\InvoiceProduct;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function allclient()
    {
        $client = Client::all();

        return view('invoice.client', compact('client'));
    }

    public function findid(Request $request)
    {

        $id = $request->id;


        $client = Client::find($id);

        return view('invoice.invoiceclient', compact('client'));
    }
    public function searchClient(Request $request)
    {
        $qry = $request['qry'];
        $client = Client::where('name', 'LIKE', '%' . $qry . '%')
            ->orWhere('email', 'LIKE', '%' . $qry . '%')
            ->orWhere('phone', 'LIKE', '%' . $qry . '%')
            ->orWhere('address', 'LIKE', '%' . $qry . '%')
            ->get();

        return view('invoice.client', compact('client'));
    }

    public function invoiceclient(Request $request)
    {


        // dd($request);


        $this->validate($request, [
            'client_id' => 'required',


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





        $invoice = Invoice::create([
            'client_id' => $request['client_id'],
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

        return redirect(route('allclient'))->with('success', 'New invoice saved');
    }

    public function delete($id)

    {
        $delete = Client::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Invoice has ben deleted');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
