<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['client_id', 'isOffer', 'invoice_no',
    'invoice_date', 'sub_total', 'tax_amount', 'total_amount'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function product(){

        return $this->hasMany('App\InvoiceProduct');
    }
}
