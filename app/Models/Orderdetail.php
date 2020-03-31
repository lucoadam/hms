<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = "orderdetails";
    //
    protected $fillable =[
		'branch_id',
		'department_id',
		'item_id',
		'book_title',
		'author',
		'publication',
		'isbn',
		'edition',
		'volume',
		'quantity',
		'cost',
    ];
}