<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = "journals";
    //
    protected $fillable =[
		'branch_id',
		'title',
		'subtitle',
		'author',
		'frequency_id',
		'quantity',
		'volume',
		'start_date',
		'end_date',
		'bstype_id',
		'publication_id',
		'journaltype_id',
		'keywords',
		'description',
    ];
}