<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $table = "suggestions";
    //
    protected $fillable =[
		'branch_id',
		'member_id',
		'book_title',
		'isbn',
		'author',
		'publication',
		'editon',
		'number_of_copies',
		'status',
		'description',
    ];
}