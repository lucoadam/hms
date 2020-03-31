<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = "editions";
    //
    protected $fillable =[
		'branch_id',
		'book_id',
		'pages',
		'volume',
		'published_year',
		'cost',
		'quantity',
		'cd',
		'edition',
    ];
}