<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    //
    protected $fillable =[
		'branch_id',
		'class',
		'category_id',
		'call_id',
		'title',
		'author',
		'publication_id',
		'published_at',
		'bstype_id',
		'book_source',
		'isbn',
		'keywords',
		'description',
		'department_id',
    ];
}