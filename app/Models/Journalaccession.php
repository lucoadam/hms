<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journalaccession extends Model
{
    protected $table = "journalaccessions";
    //
    protected $fillable =[
		'branch_id',
		'accession_number',
		'journal_id',
		'journaldetail_id',
		'status',
		'location_id',
    ];
}