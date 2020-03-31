<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchases";
    //
    protected $fillable =[
		'branch_id',
		'supplier_id',
		'invoice_number',
		'invoice_date',
		'purchased_by',
    ];
}