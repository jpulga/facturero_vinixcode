<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashReceipt extends Model
{
    protected $table = 'cash_receipts';

    protected $fillable = [
        'box_number', 'we_received', 'address', 'city', 'document_type', 
        'document_number', 'date', 'value', 'value_in_letters', 'description'
    ];
}
