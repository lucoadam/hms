<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = "issues";
    //
    protected $fillable =[
		'branch_id',
		'member_id',
		'due_date',
		'return_date',
		'fine_amount',
		'paid_amount',
		'remaining_amount',
		'accession_id',
		'bstype_id',
		'issue_type',
    ];
}