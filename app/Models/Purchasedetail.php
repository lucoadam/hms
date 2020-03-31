<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchasedetail extends Model
{
    protected $table = "purchasedetails";
    //
    protected $fillable =[
		'branch_id',
		'purchase_id',
		'book_id',
		'edition_id',
		'total_number',
		'unit_cost',
		'discount',
		'total_cost',
    ];
}