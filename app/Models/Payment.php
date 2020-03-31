<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    //
    protected $fillable =[
		'branch_id',
		'purchase_id',
		'final_amount',
		'paid_amount',
		'remaining_amount',
		'receipt_number',
		'receipt_date',
		'approved_by',
    ];
}