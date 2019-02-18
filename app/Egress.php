<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egress extends Model
{
    protected $table = 'egresses';

    protected $fillable = [
        'exit_number', 'turned', 'document_type', 'document_number', 
        'date', 'value', 'value_in_letters', 'description'
    ];

    public function scopeTurned($query, $turned)
    {   
        if (trim($turned) != "") {
            $query->where('turned', "LIKE", "%$turned%");
        }
    } 
}
