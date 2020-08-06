<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Invoice;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countInvoice=Invoice::where('isOffer',1)->count();
        $countclient=Client::all()->count();
        $countOfert=Invoice::where('isOffer',0)->count();
      
        return view('layouts.dashboard',compact('countInvoice','countclient','countOfert'));
        
    }

}
