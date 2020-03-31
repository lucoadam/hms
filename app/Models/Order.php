<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    //
    protected $fillable =[
		'branch_id',
		'supplier_id',
		'order_date',
		'total_cost',
		'status',
    ];
}