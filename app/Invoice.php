<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number', 'company_origin', 'client', 'date', 'expiration_date', 
        'document_type', 'document_number', 'cellphone', 'address', 'currency', 
        'state', 'notes', 'discount', 'sub_total', 'grand_total'
    ];

    public function products(){
        return $this->hasMany(InvoiceProduct::class);
    }
}
