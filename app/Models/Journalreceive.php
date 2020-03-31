<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journalreceive extends Model
{
    protected $table = "journalreceives";
    //
    protected $fillable =[
		'branch_id',
		'journal_id',
		'received_date',
		'volume_count',
		'received_quantity',
		'issue_number',
		'published_date',
    ];
}