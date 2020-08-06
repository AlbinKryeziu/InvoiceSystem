@extends('layouts.app')

@section('content')


 <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3>{{ $countInvoice }}</h3>
								<span class="widget-title1">Invoices <i class="" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class=""></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $countclient }}</h3>
                                <span class="widget-title2">Clients <i class="" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $countOfert}}</h3>
                                <span class="widget-title3">Oferts <i class="" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                   




@endsection
