<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journaldetail extends Model
{
    protected $table = "journaldetails";
    //
    protected $fillable =[
		'branch_id',
		'journal_id',
		'issue_number',
		'volume',
		'year',
		'month',
		'pages',
		'cost',
		'cd',
    ];
}