<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = "baskets";
    //
    protected $fillable =[
		'branch_id',
		'order_id',
		'supplier_id',
		'department_id',
		'book_title',
		'author',
		'publication',
		'isbn',
		'edition',
		'volume',
		'quantity',
		'cost',
		'suggest_id',
    ];
}