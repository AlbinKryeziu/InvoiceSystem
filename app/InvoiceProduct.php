<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $table = 'invoice_product';
    protected $fillable = [
        'quantity', 'price','category','product','total',
        'invoice_id',
    ];

    public function invoice(){

        return $this->belongsTo('App\Invoice','invoice_id','id');
    }
}
